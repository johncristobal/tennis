<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class bracketsgenerator 
{

    public $cadena;

    private $names;
    private $teams;
    private $type;
    private $brackets = array();
    private $noTeams;
    private $noRounds;
    private $playerWrapperHeight = 30;
    private $matchWrapperWidth = 150;
    private $roundSpacing = 40;
    private $matchSpacing = 42;
    private $borderWidth = 3;

    public function __construct($params)
    {
			  $this->ci=& get_instance();
                          $this->cadena = "";
        $this->names = $params['jugadores'];
        $this->teams = $params['numeroJugadores'];
        $this->type = $params['tipo'];
        $this->generateBrackets();

    }
	
    public function generateBrackets()
    {

        //If no names have been entered, then use numbers

        if ($this->names != '') {

            $teams = array_filter(array_map('htmlspecialchars', array_unique(array_map('trim',$this->names))));

            //Make sure there's at least 2 teams

            if(count($teams) == 1){
                $teams[] = 'Team 2';
            }

            $this->noTeams = count($teams);

        } else {

            $this->noTeams = ((is_numeric($this->teams)) && ($this->teams > 1)) ? $this->teams : 8;

            $teams = range(1, $this->noTeams);

        }

        //Calculate the size of the first full round - for example if you have 5 teams, then the first full round will consist of 4 teams
        $minimumFirstRoundSize = pow(2, ceil(log($this->noTeams)/log(2)));
        $this->noRounds = log($minimumFirstRoundSize, 2);
        $noByesToAdd = $minimumFirstRoundSize - $this->noTeams;

        //Add the byes to the teams array
        for($i = 0; $i < $noByesToAdd; $i++){
            $teams[] = null;
        }

        //Order the teams in a seeded order - this is required regardless of whether it is a seeded tournament or not, as it prevents BYEs playing eachother
        for($i = 0; $i < log($this->noTeams / 2, 2); $i++){

            $out = array();

            foreach($teams as $player){
                $splice = pow(2, $i);
                $out = array_merge($out, array_splice($teams, 0, $splice));
                $out = array_merge($out, array_splice($teams, -$splice));
            }

            $teams = $out;

        }

        //Randomise the draw if required - keep the position of the byes, but swap the players

        if($this->type != 1){

            $randomTeams = array();
            $shuffledTeams = array_filter($teams);
            shuffle($shuffledTeams);

            foreach($teams as $key => $team){
                $randomTeams[$key] = is_null($team) ? null : array_pop($shuffledTeams);
            }

            $teams = $randomTeams;

        }

        $roundNumber = 1;

        //Group 2 teams into a match
        $matches = array_chunk($teams, 2);

        //Only check for BYEs if there are more than 2 teams
        if($this->noTeams > 2){

            foreach($matches as $key => &$match){

                $matchNumber = $key + 1;

                //If both teams are present, then that means they haven't had a BYE to the next round, so they must play in the first round
                if($match[0] && $match[1]){

                    //Add the match to the first round
                    $this->brackets[$roundNumber][$matchNumber] = $match;

                    //Set the match to null as the result of the above match hasn't yet been determined
                    $match = null;

                }else{

                    //If only the first or second player exists, then replace the multidimensional array with the existing player
                    $match = $match[0] ? $match[0] : $match[1];

                }

            }

            //Now all of the blank spaces except the ones awaiting first round results have gone, group the single dimension array into a multiple dimensional array, so opponents share the same parent array
            $matches = array_chunk($matches, 2);

        }

        //If there's already a match in the match array, then that means the next round is round 2, so increase the round number
        if(count($this->brackets)) $roundNumber++;

        //Create the first full round of teams, some may be blank if waiting on the results of a previous round
        for($i = 0; $i < count($matches); $i++){
            $this->brackets[$roundNumber][$i+1] = $matches[$i];
        }

        //Create the result of the empty rows for this tournament

        for($roundNumber += 1; $roundNumber <= $this->noRounds; $roundNumber++){
            for($matchNumber = 1; $matchNumber <= ($minimumFirstRoundSize/pow(2, $roundNumber)); $matchNumber++){
                $this->brackets[$roundNumber][$matchNumber] = array(null, null);
            }
        }

        $this->assignPositions();

    }

    private function assignPositions()
    {

        //Variables required for figuring outing the height of the vertical connectors

        $matchSpacingMultiplier = 0.5;
        $playerWrapperHeightMultiplier = 1;

        foreach($this->brackets as $roundNumber => &$round){

            foreach($round as $matchNumber => &$match){

                //Give teams a nicer index

                $match['playerA'] = $match[0];
                $match['playerB'] = $match[1];

                unset($match[0]);
                unset($match[1]);

                //Figure out the bracket positions

                $match['matchWrapperTop'] = (((2 * $matchNumber) - 1) * (pow(2, ($roundNumber) - 1)) - 1) * (($this->matchSpacing / 2) + $this->playerWrapperHeight);
                $match['matchWrapperLeft'] = ($roundNumber - 1) * ($this->matchWrapperWidth + $this->roundSpacing - 1);
                $match['vConnectorLeft'] = floor($match['matchWrapperLeft'] + $this->matchWrapperWidth + ($this->roundSpacing / 2) - ($this->borderWidth / 2));
                $match['vConnectorHeight'] = ($matchSpacingMultiplier * $this->matchSpacing) + ($playerWrapperHeightMultiplier * $this->playerWrapperHeight) + $this->borderWidth;
                $match['vConnectorTop'] = $match['hConnectorTop'] = $match['matchWrapperTop'] + $this->playerWrapperHeight;
                $match['hConnectorLeft'] = ($match['vConnectorLeft'] - ($this->roundSpacing / 2)) + 2;
                $match['hConnector2Left'] = $match['matchWrapperLeft'] + $this->matchWrapperWidth + ($this->roundSpacing / 2);

                //Adjust the positions depending on the match number

                if(!($matchNumber % 2)){
                    $match['hConnector2Top'] = $match['vConnectorTop'] -= ($match['vConnectorHeight'] - $this->borderWidth);
                }else{
                    $match['hConnector2Top'] = $match['vConnectorTop'] + ($match['vConnectorHeight'] - $this->borderWidth);
                }

            }

            //Update the spacing variables

            $matchSpacingMultiplier *= 2;
            $playerWrapperHeightMultiplier *= 2;

        }
			//$this->printBrackets();
    }
		public function temp(){
			return "lo que sea";
		}
    public function printBrackets()
    {
        

        $this->printRoundTitles();

        $height = "100px";
        if (count($this->names)<= 4){
            $height = "250px;";
        }else if (count($this->names)<= 8){
            $height = "500px;";
        }else{
            $height = "900px;";
        }
        $this->cadena .= '<div id="brackets-wrapper" style="height:'.$height.'">';

        foreach($this->brackets as $roundNumber => $round) {

            foreach($round as $matchNumber => $match) {

                $this->cadena .= '<div class="match-wrapper" style="top: '.$match['matchWrapperTop'].'px; left: '.$match['matchWrapperLeft'].'px; width: '.$this->matchWrapperWidth.'px;">
                        <input type="text" class="score">'
                        .$this->getPlayerList($match['playerA']).
                        '<div class="match-divider">
                        </div>
                        <input type="text" class="score">'
                        .$this->getPlayerList($match['playerB']).
                     '</div>';

                if ($roundNumber != $this->noRounds) {

                    $this->cadena .= '<div class="vertical-connector" style="top: '.$match['vConnectorTop'].'px; left: '.$match['vConnectorLeft'].'px; height: '.$match['vConnectorHeight'].'px;"></div>
                          <div class="horizontal-connector" style="top: '.$match['hConnectorTop'].'px; left: '.$match['hConnectorLeft'].'px;"></div>
                          <div class="horizontal-connector" style="top: '.$match['hConnector2Top'].'px; left: '.$match['hConnector2Left'].'px;"></div>';

                }

            }

        }

        $this->cadena .= '</div>';
        
        return $this->cadena;

    }

    private function printRoundTitles(){

        if($this->noTeams == 2){

            $roundTitles = array('Final');

        }elseif($this->noTeams <= 4){

            $roundTitles = array('Semi-Finals', 'Final');

        }elseif($this->noTeams <= 8){

            $roundTitles = array('Quarter-Finals', 'Semi-Finals', 'Final');

        }else{

            $roundTitles = array('Quarter-Finals', 'Semi-Finals', 'Final');
            $noRounds = ceil(log($this->noTeams, 2));
            $noTeamsInFirstRound = pow(2, ceil(log($this->noTeams)/log(2)));
            $tempRounds = array();

            //The minus 3 is to ignore the final, semi final and quarter final rounds

            for($i = 0; $i < $noRounds - 3; $i++){
                $tempRounds[] = 'Last '.$noTeamsInFirstRound;
                $noTeamsInFirstRound /= 2;
            }

            $roundTitles = array_merge($tempRounds, $roundTitles);
            
        }

        $this->cadena .= '<div class="row" id="round-titles-wrapper">';

        foreach($roundTitles as $key => $roundTitle) {

            $left = $key * ($this->matchWrapperWidth + $this->roundSpacing - 1);

            $this->cadena .= '<div class="round-title" style="left: '.$left.'px;">' . $roundTitle . '</div>';

        }

        $this->cadena .= '</div>';

    }

    private function getPlayerList($selected)
    {

        $html = '<select>
                <option'.($selected == '' ? ' selected' : '').'></option>';

        foreach(array_merge($this->brackets[1], $this->brackets[2]) as $bracket){

            if($bracket['playerA'] != ''){
                $html .= '<option'.($selected == $bracket['playerA'] ? ' selected' : '').'>'.$bracket['playerA'].'</option>';
            }

            if($bracket['playerB'] != ''){
                $html .= '<option'.($selected == $bracket['playerB'] ? ' selected' : '').'>'.$bracket['playerB'].'</option>';
            }

        }

        $html .= '</select>';

        return $html;

    }

}