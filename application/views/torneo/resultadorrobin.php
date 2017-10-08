<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->

<?php   
    $this->load->view("head");
    $this->load->view("header");
?>            

        <div class="container">
        
            <!--div id="sub-head">
                <div class="flyIn">
                    <h2>Pricing plans</h2>
                    <p>Est omnis nulla ut, ius clita virtute persecuti at, id ipsum inermis aliquando. Ne iracundia omittantur has, at invidunt invenire nec.</p>
                </div>
            </div-->
            
            <h3 class="title-green">Resultados</h3>
            
            <!--div class="row text-center plans">
            
                <div class="plan col-md-4">
                    <h2 class="plan-title">Gym training</h2>
                    <p class="plan-price">$30<span>/mo</span></p>
                    <ul class="plan-features">
                        <li><strong>Check and go</strong> included</li>
                        <li><strong>3 sessions</strong> per week</li>
                        <li><strong>6 months</strong> valid</li>
                    </ul>
                    <p class="text-center"><a href="javascript:void(0)" class="button_medium">Start Now</a></p>
                </div> <!-- End col-md-4 -->
                
                <!--div class="plan plan-tall col-md-4">
                    <h2 class="plan-title">Home training</h2>
                    <p class="plan-price">$49<span>/mo</span></p>
                    <ul class="plan-features">
                        <li><strong>Check and go</strong> included</li>
                        <li><strong>3 sessions</strong> per week</li>
                        <li><strong>6 months</strong> valid</li>
                    </ul>
                    <p class="text-center"><a href="javascript:void(0)" class="button_medium">Start Now</a></p>
                </div><!-- End col-md-4 -->
                
                <!--div class="plan col-md-4">
                    <h2 class="plan-title">Company training</h2>
                    <p class="plan-price">$99<span>/mo</span></p>
                    <ul class="plan-features">
                        <li><strong>Check and go</strong> included</li>
                        <li><strong>3 sessions</strong> per week</li>
                        <li><strong>6 months</strong> valid</li>
                    </ul>
                    <p class="text-center"><a href="javascript:void(0)" class="button_medium">Start Now</a></p>
                </div>
            </div><!-- End col-md-4 -->
            
            <!--div class="row">
                <div class="col-md-12">
                    <h4>Details</h4>
                    <p>
                        Lorem ipsum dolor sit amet, duo ceteros conclusionemque et, quo oporteat corrumpit ea. At quo populo hendrerit. Pri illud intellegat et. Mea te altera noster, odio quaeque cu vis, in vix dissentiet eloquentiam. Doming noluisse quo te, alia regione iudicabit sea id.
                    </p>
                    <p>
                        Falli labore verterem an eam, vix tantas noluisse ne, mel et stet detracto honestatis. Te expetendis definitiones eam, justo necessitatibus mel ex. Ne propriae placerat pertinax vim, an choro quaestio sit. His putant lobortis in, mel in nisl principes dignissim. Nisl blandit cu vim, amet graeci no est. His ne ponderum constituto philosophia.
                    </p>
                </div>
            </div><!-- End row-->
            
            <!--h3 class="title">Style Two</h3-->
            <div class="row">
                <!--div class="col-md-3">
                
                    <div class="pricing-table blue rounded">
                        <div class="pricing-table-header">
                            <span class="heading">Single session</span>
                            <span class="price-value"><span>30</span><span class="mo">$</span></span>
                        </div>
                        <div class="pricing-table-space "></div>
                        <div class="pricing-table-features">
                            <p><strong>One month</strong> valid</p>
                            <p><strong> Saving</strong> %</p>
                            <p><strong>Saving price</strong> 0$</p>
                            <p><strong>Gym training</strong> only</p>
                        </div>
                        
                        <div class="pricing-table-sign-up">
                            <a href="javascript:void(0)" class="btn btn-large btn-block btn-primary">BUY NOW!</a>
                        </div>
    
                    </div>
                </div><!-- End col-md-3 -->
                
                <!--div class="col-md-3">
                    <div class="pricing-table blue">
                        <div class="pricing-table-header">
                            <span class="heading">12 Sessions</span>
                            <span class="price-value"><span>280</span><span class="mo">$</span></span>
                        </div>
                        <div class="pricing-table-space "></div>
                        <div class="pricing-table-features">
                            <p><strong>Three month</strong> valid</p>
                            <p><strong> Saving </strong> 20%</p>
                            <p><strong>Saving price</strong> 40$</p>
                            <p><strong>Gym + Home </strong>training</p>
                        </div>
                        
                        <div class="pricing-table-sign-up">
                            <a href="javascript:void(0)" class="btn btn-block btn-primary">BUY NOW!</a>
                        </div>
                        
                    </div>
                </div><!-- End col-md-3 -->
                
                <div class="col-md-12">
                    <div class="pricing-table green">
                        
                        <div class="pricing-table-header" style="text-align: left;">
                            <span class="price-value">
                                <span><?=$torneodata[0]->nombre;?></span>
                                <!--span class="mo">$</span--></span>
                            <span class="heading"><?=$torneodata[0]->lugar;?>
                                <br>
                                <strong><?=$torneodata[0]->fecha_inicio;?></strong>
                                <table width="100%" align="right">
                                    <tr>
                                        <td width="100%" align="right">
                                            <button type="button">Ver tabla general</button>
                                        </td>
                                    </tr>
                                </table>
                            </span>
                            

                        </div>
                        
                        <div class="pricing-table-space"></div>
                        
                        <!--div class="pricing-table-features">
                            <p><strong>Six month</strong> valid</p>
                            <p><strong> Saving </strong> 30%</p>
                            <p><strong>Saving price</strong> 80$</p>
                            <p><strong>Gym + Home </strong>training</p>
                        </div>
                        
                        <div class="pricing-table-sign-up">
                            <a href="javascript:void(0)" class="btn btn-block btn-success">BUY NOW!</a>
                        </div-->
                        
                    </div><!-- End pricing-table-->
                </div><!-- End col-md-3 -->
            </div><!-- End row -->
            
            <div class="row">
                <div class="col-md-12" style="font-size: 15px;">
                    <!--div class="pricing-table-features">
                            <p><strong>Six month</strong> valid</p>
                            <p><strong> Saving </strong> 30%</p>
                            <p><strong>Saving price</strong> 80$</p>
                            <p><strong>Gym + Home </strong>training</p>
                    </div-->
                <?php
                $i=1;
                foreach ($partidos as $value){
                    
                ?>  
                    <table class="table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>
                                Semana <?=$i?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                foreach ($value as $rondas) {
                ?>
                    <tr>
                        <td width="20%"><span style="font-size: 12px;">(<?=$rondas->rank1?>)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador"><?=$rondas->fkjugador1;?></a></td>
                        <td width="20%"><span style="font-size: 12px;">(<?=$rondas->rank2?>)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador"><?=$rondas->fkjugador2;?></a></td>
                        <td width="20%"><?=$rondas->resultado;?></td>
                    </tr>
                <?php    
                }

                $i++;
                ?>
                    </table>    
                <?php
                }
                ?>
                <!--table class="table-striped" width="100%">
                    <thead>
                      <tr>
                        <th>Semana n</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                        <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>                      <!--tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                      </tr>
                    </tbody>
                </table>                      
                    
                <table class="table-striped" width="100%">
                    <thead>
                      <tr>
                        <th>Semana n</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                        <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>                      <!--tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                      </tr>
                    </tbody>
                </table>    
                    
                <table class="table-striped" width="100%">
                    <thead>
                      <tr>
                        <th>Semana n</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                        <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>                      
                    </tbody>
                </table>                       

                <table class="table-striped" width="100%">
                    <thead>
                      <tr>
                        <th>Semana n</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                        <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>
                      <tr>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                          <td width="20%"><span style="font-size: 12px;">(1)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador">John</a></td>
                        <td width="20%">6-2 6-0</td>
                      </tr>                      
                    </tbody>
                </table-->   
                    
                </div>
            </div>
            <br>
            <div class="row second">
                <div class="col-md-12 infomsg2 alert" style="font-weight: 600; font-size: larger; text-align: center;" id="tabla">
                    Tabla general
                </div>
                <div class="col-md-12">
                    <table class="table" width="100%">
                    <thead>
                      <tr>
                        <th>Posición</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Puntos</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td width="20%" align="center">1. </td>
                          <td width="40%" align="center"><a href="<?php echo base_url();?>player/jugador">John Cristobal</a></td>
                          <td width="20%" align="center">30</td>
                          <td width="20%" align="center">30</td>
                      </tr>
                      <tr>
                          <td width="20%" align="center">1. </td>
                          <td width="40%" align="center"><a href="<?php echo base_url();?>player/jugador">John Cristobal</a></td>
                          <td width="20%" align="center">30</td>
                          <td width="20%" align="center">30</td>
                      </tr>
                      <tr>
                          <td width="20%" align="center">1. </td>
                          <td width="40%" align="center"><a href="<?php echo base_url();?>player/jugador">John Cristobal</a></td>
                          <td width="20%" align="center">30</td>
                          <td width="20%" align="center">30</td>
                      </tr>
                      <tr>
                          <td width="20%" align="center">1. </td>
                          <td width="40%" align="center"><a href="<?php echo base_url();?>player/jugador">John Cristobal</a></td>
                          <td width="20%" align="center">30</td>
                          <td width="20%" align="center">30</td>
                      </tr>
                      <tr>
                          <td width="20%" align="center">1. </td>
                          <td width="40%" align="center"><a href="<?php echo base_url();?>player/jugador">John Cristobal</a></td>
                          <td width="20%" align="center">30</td>
                          <td width="20%" align="center">30</td>
                      </tr>
                      <tr>
                          <td width="20%" align="center">1. </td>
                          <td width="40%" align="center"><a href="<?php echo base_url();?>player/jugador">John Cristobal</a></td>
                          <td width="20%" align="center">30</td>
                          <td width="20%" align="center">30</td>
                      </tr>
                      <tr>
                          <td width="20%" align="center">1. </td>
                          <td width="40%" align="center"><a href="<?php echo base_url();?>player/jugador">John Cristobal</a></td>
                          <td width="20%" align="center">30</td>
                          <td width="20%" align="center">30</td>
                      </tr>
                      <tr>
                          <td width="20%" align="center">1. </td>
                          <td width="40%" align="center"><a href="<?php echo base_url();?>player/jugador">John Cristobal</a></td>
                          <td width="20%" align="center">30</td>
                          <td width="20%" align="center">30</td>
                      </tr>
                      <!--tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td>july@example.com</td>
                      </tr-->
                    </tbody>
                </table> 
                </div>
            </div>

            
        </div><!-- End container -->
        
        <?php $this->load->view("footer");?>        

         <div id="toTop">Back to Top</div>  

        <?php 
            $this->load->view("scriptfoo");
        ?> 
         
         <script type="text/javascript">
            $("button").click(function() {
                $('html,body').animate({
                    scrollTop: $(".second").offset().top},
                    'slow');
            });
             </script>

</body>
</html>