	<!-- HEADER -->
    <header id="header"  style="background: #333;">
        <div id="logo-group" style="background-color: #333;">
                     
            <!-- PLACE YOUR LOGO HERE -->
            <span id="logo"><img src="/frontend//img/logo.png" alt="DSH"></span>            
            <!-- END LOGO PLACEHOLDER -->
            	<!-- Note: The activity badge color changes when clicked and resets the number to 0
				Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
				<span id="activity" class="activity-dropdown badge-tag"> <i class="fa fa-bell-o"></i> <b id="badge" class="badge">{{$countNotification}}</b> </span>
              
				<!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
				<div class="ajax-dropdown">
					<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
					<!--<div class="btn-group btn-group-justified" data-toggle="buttons">
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/mail.html">
							 </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/notifications.html">
							 </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/tasks.html">
							 </label>
                    </div>-->                    
                    <p>Notifications ({{$countNotification }}) <p>
					<!-- notification content -->
					<div class="ajax-notifications custom-scroll">
                        <ul class="notification-body">
                            <!--Calendar events -->
                            @foreach($eventofday as $event )                                   
                            <li>
                                <span class="padding-10 unread">
                                    <em class="badge padding-5 no-border-radius bg-color-gray txt-color-white pull-left margin-right-5">
                                        <i class="fa fa-calendar fa-fw fa-2x"></i>
                                    </em>
                                    <span>
                                        <a href="{{route('backoffice_calendar')}}" class="display-normal"><strong>Calendrier</strong></a>: {{$event->title}}
                                        <br>
                                        <strong>Du {{$event->start_date}} au {{$event->end_date}}</strong><br>
                                        <span class="pull-right font-xs text-muted"><i>Ajourd'hui</i></span>
                                    </span>
                                </span>                                  
                            </li>
                            @endforeach                           

                            @foreach($eventoftomorrow as $event )    
                            <li>
                                <span class="padding-10 unread">
                                    <em class="badge padding-5 no-border-radius bg-color-gray txt-color-white pull-left margin-right-5">
                                        <i class="fa fa-calendar fa-fw fa-2x"></i>
                                    </em>
                                    <span>
                                        <a href="{{route('backoffice_calendar')}}" class="display-normal"><strong>Calendrier</strong></a>: {{$event->title}}
                                        <br>
                                        <strong>Du {{$event->start_date}} au {{$event->end_date}}</strong><br>
                                        <span class="pull-right font-xs text-muted"><i>Demain</i></span>
                                    </span>
                                </span>
                            </li>
                            @endforeach
                            <!--/Calendar events-->
                            
                            <!--Tracteur Documents-->
                            @foreach($documentsnotif as $docNotif )   
                            @if($docNotif->tracteur->prestataire == 'DSH TRANS') 
                            <li>
                                <span class="padding-10 unread">
                                    <em class="badge padding-5 no-border-radius bg-color-gray txt-color-white pull-left margin-right-5">
                                        <i class="fa fa-file fa-fw fa-2x"></i>
                                    </em>
                                    <span>
                                        <a href="{{route('backoffice_documents_tracteur',$docNotif->tracteur_id)}}" class="display-normal"><strong>Document</strong></a>: {{$docNotif->document}}, Tracteur: {{$docNotif->tracteur->immatriculation}}
                                        <br>
                                        <strong>Date:{{$docNotif->date}} Date d'expiration:{{$docNotif->date_expiration}}</strong><br>
                                        <span class="pull-right font-xs text-muted"><i>Ajourd'hui</i></span>
                                    </span>
                                </span>
                            </li>
                            @endif
                            @endforeach

                            @foreach($documentsTomorrow as $docTomorrow ) 
                            @if($docTomorrow->tracteur->prestataire == 'DSH TRANS')                                
                            <li>
                                <span class="padding-10 unread">
                                    <em class="badge padding-5 no-border-radius bg-color-gray txt-color-white pull-left margin-right-5">
                                        <i class="fa fa-file fa-fw fa-2x"></i>
                                    </em>
                                    <span>
                                        <a href="{{route('backoffice_documents_tracteur',$docTomorrow->tracteur_id)}}" class="display-normal"><strong>Document</strong></a>: {{$docTomorrow->document}}, Tracteur:  {{$docTomorrow->tracteur->immatriculation}}
                                        <br>
                                        <strong>Date:{{$docTomorrow->date}} Date d'expiration:{{$docTomorrow->date_expiration}}</strong><br>
                                        <span class="pull-right font-xs text-muted"><i>Demain</i></span>
                                    </span>
                                </span>
                            </li>
                            @endif
                            @endforeach
                            <!--/Tracteur Documents-->
                            <!--SemiRemorque Documents-->
                            @foreach($documentsSMnotif as $docSMNotif )   
                            @if($docSMNotif->semiremorque->prestataire == 'DSH TRANS') 
                            <li>
                                <span class="padding-10 unread">
                                    <em class="badge padding-5 no-border-radius bg-color-gray txt-color-white pull-left margin-right-5">
                                        <i class="fa fa-file fa-fw fa-2x"></i>
                                    </em>
                                    <span>
                                        <a href="{{route('backoffice_documents_semi_remorque',$docSMNotif->semiremorque_id)}}" class="display-normal"><strong>Document</strong></a>: {{$docSMNotif->document}}, Semi-remorque: {{$docSMNotif->semiremorque->immatriculation}}
                                        <br>
                                        <strong>Date:{{$docSMNotif->date}} Date d'expiration:{{$docSMNotif->date_expiration}}</strong><br>
                                        <span class="pull-right font-xs text-muted"><i>Ajourd'hui</i></span>
                                    </span>
                                </span>
                            </li>
                            @endif
                            @endforeach

                            @foreach($documentsSMTomorrow as $docSMTomorrow ) 
                            @if($docSMTomorrow->semiremorque->prestataire == 'DSH TRANS')                                
                            <li>
                                <span class="padding-10 unread">
                                    <em class="badge padding-5 no-border-radius bg-color-gray txt-color-white pull-left margin-right-5">
                                        <i class="fa fa-file fa-fw fa-2x"></i>
                                    </em>
                                    <span>
                                        <a href="{{route('backoffice_documents_semi_remorque',$docSMTomorrow->semiremorque_id)}}" class="display-normal"><strong>Document</strong></a>: {{$docSMTomorrow->document}}, Semi-remorque:  {{$docSMTomorrow->semiremorque->immatriculation}}
                                        <br>
                                        <strong>Date:{{$docSMTomorrow->date}} Date d'expiration:{{$docSMTomorrow->date_expiration}}</strong><br>
                                        <span class="pull-right font-xs text-muted"><i>Demain</i></span>
                                    </span>
                                </span>
                            </li>
                            @endif
                            @endforeach 
                            <!--/SemiRemorque Documents-->
                            <!--Voitures de service Documents-->
                            @foreach($documentsVSnotif as $docVSNotif )   
                            @if($docVSNotif->voituresservice->prestataire == 'DSH TRANS') 
                            <li>
                                <span class="padding-10 unread">
                                    <em class="badge padding-5 no-border-radius bg-color-gray txt-color-white pull-left margin-right-5">
                                        <i class="fa fa-file fa-fw fa-2x"></i>
                                    </em>
                                    <span>
                                        <a href="{{route('backoffice_documents_voiture_service',$docVSNotif->voiture_id)}}" class="display-normal"><strong>Document</strong></a>: {{$docVSNotif->document}}, Voiture de service: {{$docVSNotif->voituresservice->immatriculation}}
                                        <br>
                                        <strong>Date:{{$docVSNotif->date}} Date d'expiration:{{$docVSNotif->date_expiration}}</strong><br>
                                        <span class="pull-right font-xs text-muted"><i>Ajourd'hui</i></span>
                                    </span>
                                </span>
                            </li>
                            @endif
                            @endforeach

                            @foreach($documentsVSTomorrow as $docVSTomorrow ) 
                            @if($docVSTomorrow->voituresservice->prestataire == 'DSH TRANS')                                
                            <li>
                                <span class="padding-10 unread">
                                    <em class="badge padding-5 no-border-radius bg-color-gray txt-color-white pull-left margin-right-5">
                                        <i class="fa fa-file fa-fw fa-2x"></i>
                                    </em>
                                    <span>
                                        <a href="{{route('backoffice_documents_voiture_service',$docVSTomorrow->voiture_id)}}" class="display-normal"><strong>Document</strong></a>: {{$docVSTomorrow->document}}, Voiture de service:  {{$docVSTomorrow->voituresservice->immatriculation}}
                                        <br>
                                        <strong>Date:{{$docVSTomorrow->date}} Date d'expiration:{{$docVSTomorrow->date_expiration}}</strong><br>
                                        <span class="pull-right font-xs text-muted"><i>Demain</i></span>
                                    </span>
                                </span>
                            </li>
                            @endif
                            @endforeach 
                            <!--/Voitures de service Documents-->
                            
                             <!--Personnels Documents-->
                             @foreach($documentsPersnotif as $docPersNotif )   
                             <li>
                                 <span class="padding-10 unread">
                                     <em class="badge padding-5 no-border-radius bg-color-gray txt-color-white pull-left margin-right-5">
                                         <i class="fa fa-file fa-fw fa-2x"></i>
                                     </em>
                                     <span>
                                         <a href="{{route('backoffice_documents_personnels',$docPersNotif->personnel_id)}}" class="display-normal"><strong>Document</strong></a>: {{$docPersNotif->document}}, Personnel: {{$docPersNotif->matricule}}
                                         <br>
                                         <strong>Date:{{$docPersNotif->date}} Date d'expiration:{{$docPersNotif->date_expiration}}</strong><br>
                                         <span class="pull-right font-xs text-muted"><i>Ajourd'hui</i></span>
                                     </span>
                                 </span>
                             </li>
                             @endforeach
 
                             @foreach($documentsPersTomorrow as $docPersTomorrow ) 
                             <li>
                                 <span class="padding-10 unread">
                                     <em class="badge padding-5 no-border-radius bg-color-gray txt-color-white pull-left margin-right-5">
                                         <i class="fa fa-file fa-fw fa-2x"></i>
                                     </em>
                                     <span>
                                         <a href="{{route('backoffice_documents_personnels',$docPersTomorrow->personnel_id)}}" class="display-normal"><strong>Document</strong></a>: {{$docPersTomorrow->document}}, Personnel:  {{$docPersTomorrow->matricule}}
                                         <br>
                                         <strong>Date:{{$docPersTomorrow->date}} Date d'expiration:{{$docPersTomorrow->date_expiration}}</strong><br>
                                         <span class="pull-right font-xs text-muted"><i>Demain</i></span>
                                     </span>
                                 </span>
                             </li>
                             @endforeach 
                             <!--/Personnels Documents-->

                        </ul>

					</div>
					<!-- end notification content -->

				</div>
				<!-- END AJAX-DROPDOWN -->
			</div>
        </div>


        <!-- pulled right: nav area -->
        <div class="pull-right" style="background-color: #333;">            
            <!-- collapse menu button -->
            <div id="hide-menu" class="btn-header pull-right">
                <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
            </div>
            <!-- end collapse menu -->
            <ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
				<li class="">
					<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
						<img src="/frontend/img/avatars/sunny.png" alt="John Doe" class="online" />  
					</a>
					<ul class="dropdown-menu pull-right">	
						<li>
							<a href="" class="padding-10 padding-top-0 padding-bottom-0" ><i class="fa fa-user"></i> {{ Auth::user()->name}}</a>
						</li>
						<li class="divider"></li>
						
						<li>
							<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
						</li>
						<li class="divider"></li>
						<li>
                            <a class="padding-10 padding-top-5 padding-bottom-5" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                              <i class="fa fa-sign-out fa-lg"></i> <strong>Se déconnecter</strong>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                            </form>
                            
						</li>
					</ul>
				</li>
            </ul>

                
                <!-- Authentication Links -->
                @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                <li class="">
                    <ul class="dropdown-menu pull-right" aria-labelledby="">
                        <li>                                                                
                        <a class="" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                         <i class="fa fa-sign-out fa-lg"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    </ul>
                </li>
                @endguest
				<!-- end logout button -->


            
           <!-- <div id="logout" class="btn-header transparent pull-right">
                <span>
                    <a href="login.html" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
            </div>-->
            <!-- end logout button -->

            <!-- search mobile button (this is hidden till mobile view port) -->
           <!-- <div id="search-mobile" class="btn-header transparent pull-right">
                <span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
            </div>-->
            <!-- end search mobile button -->

            <!-- input: search field -->
            <!--<form action="" class="header-search pull-right">
                <input id="search-fld"  type="text" name="param" placeholder="Find reports and more" data-autocomplete='[
                "ActionScript",
                "AppleScript",
                "Asp",
                "BASIC",
                "C",
                "C++",
                "Clojure",
                "COBOL",
                "ColdFusion",
                "Erlang",
                "Fortran",
                "Groovy",
                "Haskell",
                "Java",
                "JavaScript",
                "Lisp",
                "Perl",
                "PHP",
                "Python",
                "Ruby",
                "Scala",
                "Scheme"]'>
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
                <a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
            </form>-->
            <!-- end input: search field -->

            <!-- fullscreen button -->
            <!--<div id="fullscreen" class="btn-header transparent pull-right">
                <span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
            </div>-->
            <!-- end fullscreen button -->       
 

        </div>
        <!-- end pulled right: nav area -->

        

    </header>
    <!-- END HEADER -->