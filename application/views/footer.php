<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Contáctanos</h5>
                    <p>
                        
                    </p>
                    <ul>
                        <!--li><i class="icon-user"></i> Personal trainer Name</li-->
                        <li><i class="icon-phone"></i> Telefono: 55 0000-0000 </li>
                        <li><i class="icon-envelope"></i> Email: <a href="mailto:nowoscmexico@gmail.com">nowoscmexico@gmail.com</a></li>
                        <!--li><i class="icon-skype"></i> Skype name: Planar</li-->
                    </ul>
                    <ul class="social-bookmarks clearfix">
                        <li class="linkedin"><a href="#">behance</a></li>
                        <li class="facebook"><a href="#">facebook</a></li>
                        <li class="googleplus"><a href="#">googleplus</a></li>
                        <li class="twitter"><a href="#">twitter</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="add_bottom_15">¿Tienes una duda o sugerencia? Envíanos un correo</h5>
                    <div id="message-friend"></div>
                    <form method="post" action="<?php echo base_url();?>Correo/Enviar_correo">
                        <div class="form-bg-1"><input type="text" name="name_footer" id="name_footer" class="form-control" placeholder="Nombre*"></div>
                        <!--div class="form-bg-2"><input type="text" id="friendname_footer" class="form-control" placeholder="Your friend name*"></div-->
                        <div class="form-bg-2"><input type="email" name="correo" id="friendemail_footer" class="form-control" placeholder="Correo*"></div>
                        <div class="form-bg-1"><textarea rows="3" name="message_footer" id="message_footer" class="form-control" placeholder="Mensaje*"></textarea></div>
                        <!--div class="form-bg-1"><input type="text" id="verify_footer" class="form-control" placeholder="Are you human? 3 + 1 ="></div-->
                        <input type="submit" id="submit-friend" value="Enviar" class=" button_medium add_top_30">
                    </form>
                </div>
            </div>
        </div>
        <div id="copy">
            <img src="<?php echo base_url();?>img/footer.png" alt="footer" style="width: 100%; height: fit-content;">
        </div>
        </footer><!-- End footer -->