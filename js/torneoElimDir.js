

var matchBlankData = {
  teams : [
    ["A. García",null ],
    ["R. Salas", "A. Cortés"],
    ["A. Cuevas", "R Orihuela"],
    ["R. Parra", "J. Castillo"],
    [null, "C. Maya"],
    ["M. Cruz", "A. Hidalgo"],
    ["C. Ramírez", "V. Sanjuan"],
    ["V. Rodríguez", "E. Hidalgo"]
  ],
  results : [
    //first round - last 16
    [
      [null,null,'Match 2'], 
      [,,'Match 2'], 
      [,,'Match 3'], 
      [,,'Match 4'], 
      [null,null,'Match 5'], 
      [,,'Match 6'], 
      [,,'Match 7'], 
      [,,'Match 8']
    ]/*,
    //second round - Quarter Final
     [
      [4,3,'Match 9'], 
      [1,4,'Match 10'], 
      [1,4,'Match 11'], 
      [1,4,'Match 12']
    ],
    //third round - Semi Final
     [
      [4,3,'Match 13'], 
      [1,4,'Match 14']
    ],
    //fourth round - Final
     [
      [], //winners
      [1,4,'Match 16'] //third place
    ]*/
  ]
}
 
function onclick(data) {
  $('#matchCallback').text("onclick(data: '" + data + "')")
}
 
function onhover(data, hover) {
  $('#matchCallback').text("onhover(data: '" + data + "', hover: " + hover + ")")
}
 
$(function() {

  $('#matchesblank .demo').bracket({
    init: matchBlankData,
    onMatchClick: onclick,
    onMatchHover: onhover
  })
})