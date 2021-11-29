

<aside id="left-panel">
    <!-- NAVIGATION : This navigation is also responsive-->
    <nav >
        <ul >
            <!--Accueil-->
            <li class="@if(isset($classe_accueil)) active @endif" >
                <a href="{{ URL::route('backoffice_accueil') }}" title="Accueil" style="" ><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Accueil</span></a>	
                <ul>
                    <!--Flotte-->
                    <li class="@if(isset($classe_flotte)) active @endif">
                        <a href="">Flotte</a>
                        <ul>
                            <li class="@if(isset($classe_parcs)) active @endif">
                                <a href="">Parc</a>
                                <ul>
                                    <li class="@if(isset($classe_tracteur)) active @endif">
                                        <a href="{{route('backoffice_tracteurs')}}">Tracteurs</a>
                                    </li>
                                    <li  class="@if(isset($classe_semi_remorque)) active @endif">
                                        <a href="{{route('backoffice_semi_remorques')}}">Semi-remorques</a>
                                    </li>
                                    <li class="@if(isset($classe_voiture_service)) active @endif">
                                        <a href="{{route('backoffice_voitures_service')}}">Voitures de service</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="@if(isset($classe_contrat_leasing)) active @endif">
                                <a href="{{route('backoffice_contrats_leasing')}}">Contrats de leasing</a>
                            </li>
                            <li class="@if(isset($classe_contrat_achat)) active @endif">
                                <a href="{{route('backoffice_contrats_achat')}}">Contrats d'achat</a>
                            </li>
                            <li class="@if(isset($classe_contrat_location)) active @endif">
                                <a href="{{route('backoffice_contrats_location')}}">Contrats de location</a>
                            </li>
                            <li class="@if(isset($classe_vehicule_reforme)) active @endif">
                                <a href="{{route('backoffice_vehicules_reformes')}}">Véhicules réformés</a>
                            </li>
                            <li class="@if(isset($classe_piece_jointe)) active @endif">
                                <a href="{{route('backoffice_pieces_jointes')}}">Pièces jointes</a>
                            </li>
                            <li class="@if(isset($classe_equipement_vehicule)) active @endif">
                                    <a href="{{route('backoffice_equipements_vehicules')}}">Equipements des véhicules</a>
                                </li>
                        </ul>
                    </li>
                    <!--RH-->
                    <li class="@if(isset($classe_ressource_humaine)) active @endif">
                        <a href="">Ressources Humaines</a>
                        <ul>
                            <li class="@if(isset($classe_personnels)) active @endif">
                                <a href="{{route('backoffice_personnels')}}">Personnels</a>
                            </li>
                            <li class="@if(isset($classe_autorisation_absence)) active @endif">
                                    <a href="{{route('backoffice_autorisations_absences')}}">Autorisations d'absences</a>
                                </li>
                        </ul>
                    </li>
                    <!--Juridique-->
                    <li class="@if(isset($classe_juridik)) active @endif">
                        <a href="">Juridique</a>
                        <ul>
                            <li class="@if(isset($classe_sinistr)) active @endif">
                                <a href="{{route('backoffice_sinistres')}}">Sinistres</a>
                            </li>
                        </ul>
                    </li>
                    <!--Maintenance-->
                    <li class="@if(isset($classe_maintenance)) active @endif">
                        <a href="">Maintenance</a>
                        <ul>
                            <li class="@if(isset($classe_demandeintervention)) active @endif">
                                <a href="{{route('backoffice_demandes_interventions')}}">Demandes d'interventions</a>
                            </li>
                            <li class="@if(isset($classe_diagnostic)) active @endif">
                                    <a href="{{route('backoffice_diagnostic')}}">Diagnostic</a>
                            </li>
                            
                        </ul>
                    </li>
                </ul>
            </li>            
            <!--Referentiel-->
            <li class="@if(isset($classe_referentiel)) active @endif">
                <a href="{{ URL::route('backoffice_referentiel') }}"><i class="fa fa-lg fa-fw fa-database"></i> <span class="menu-item-parent">Référentiel </span></a>
                    <ul>
                        <!--Entreprise-->
                        <li class="@if(isset($classe_entreprise)) active @endif">
                            <a href="{{ URL::route('backoffice_entreprise') }}">Données de l'entreprise</a>
                        </li>
                        <!--Utilisation-->
                        <li class="@if(isset($classe_utilisation)) active @endif" >
                            <a href="">Utilisation</a>
                            <ul>
                                <li class="@if(isset($classe_personnel)) active @endif" >
                                    <a href="">Personnel</a>
                                    <ul>
                                        <li class="@if(isset($classe_centre_medical)) active @endif">
                                                    <a href="{{ URL::route('backoffice_centres_medicaux') }}">Centres Médicaux</a>
                                        </li>
                                        <li class="@if(isset($classe_centre_formation)) active @endif">
                                                        <a href="{{ URL::route('backoffice_centres_formation') }}">Centres de formation</a>
                                        </li>
                                        <li class="@if(isset($classe_nationalite)) active @endif">
                                                <a href="{{ URL::route('backoffice_nationalites') }}">Nationalités</a>
                                        </li>
                                        <li class="@if(isset($classe_situation)) active @endif">
                                                <a href="{{ URL::route('backoffice_situations') }}">Situations</a>
                                        </li>
                                        <li class="@if(isset($classe_situation_familiale)) active @endif">
                                                <a href="{{ URL::route('backoffice_situations_familiales') }}">Situations familiales</a>
                                        </li>
                                        <li class="@if(isset($classe_pays)) active @endif">
                                            <a href="{{ URL::route('backoffice_pays') }}">Pays</a>
                                        </li>
                                        <li class="@if(isset($classe_villes)) active @endif">
                                            <a href="{{ URL::route('backoffice_villes') }}">Villes</a>
                                        </li>
                                        <li class="@if(isset($classe_epi)) active @endif">
                                                <a href="{{ URL::route('backoffice_epi') }}">Equipement de protection individuelle</a>
                                        </li>
                                        <li class="@if(isset($classe_types_promotion)) active @endif">
                                                <a href="{{ URL::route('backoffice_types_promotion') }}">Types de promotion</a>
                                        </li>
                                        <li class="@if(isset($classe_types_sanctions)) active @endif">
                                                <a href="{{ URL::route('backoffice_types_sanctions') }}">Types de sanctions</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="@if(isset($classe_caisse)) active @endif" >
                                    <a href="">Caisses</a>
                                    <ul>
                                        <li class="@if(isset($classe_caisses)) active @endif">
                                            <a href="{{ URL::route('backoffice_caisses') }}">Caisses</a>
                                        </li>
                                        <li class="@if(isset($classe_tresorerie)) active @endif" >
                                            <a href="">Trésorerie</a>
                                            <ul>
                                                <li class="@if(isset($classe_banques)) active @endif">
                                                    <a href="{{ URL::route('backoffice_banques') }}">Banques</a>
                                                </li>
                                                <li class="@if(isset($classe_agences)) active @endif">
                                                    <a href="{{ URL::route('backoffice_agences') }}">Agences bancaires</a>
                                                </li>
                                                <li class="@if(isset($classe_comptes)) active @endif">
                                                        <a href="{{ URL::route('backoffice_comptes') }}">Comptes bancaires</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="@if(isset($classe_cat_motif_encaissement)) active @endif">
                                                <a href="{{ URL::route('backoffice_categories_motifs_encaissement') }}">Catégories motifs encaissement</a>
                                            </li>
                                            <li class="@if(isset($classe_cat_motif_decaissement)) active @endif">
                                                    <a href="{{ URL::route('backoffice_categories_motifs_decaissement') }}">Catégories motifs decaissement</a>
                                                </li>
                                                <li class="@if(isset($classe_motif_encaissement)) active @endif">
                                                        <a href="{{ URL::route('backoffice_motifs_encaissement') }}">Motifs d'encaissement</a>
                                                </li>
                                                <li class="@if(isset($classe_motif_decaissement)) active @endif">
                                                        <a href="{{ URL::route('backoffice_motifs_decaissement') }}">Motifs du decaissement</a>
                                                </li>
                                    </ul>
                                   
                                </li>
                                <li class="@if(isset($classe_u_tva)) active @endif">
                                    <a href="">TVA</a>
                                    <ul>
                                        <li class="@if(isset($classe_type_tva)) active @endif">
                                            <a href="{{ URL::route('backoffice_type_tva') }}">Types des TVA</a>
                                        </li>
                                        <li class="@if(isset($classe_tva)) active @endif">
                                            <a href="{{ URL::route('backoffice_tva') }}">Liste des TVA</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="@if(isset($classe_transport)) active @endif">
                                        <a href="">Transport</a>
                                        <ul>
                                            <li class="@if(isset($classe_lieux)) active @endif">
                                                <a href="{{ URL::route('backoffice_lieux') }}">Lieux</a>
                                            </li>
                                            <li class="@if(isset($classe_trajets)) active @endif">
                                                <a href="{{ URL::route('backoffice_trajets') }}">Trajets</a>
                                            </li>
                                            <li class="@if(isset($classe_categorie_trajet)) active @endif">
                                                <a href="{{ URL::route('backoffice_categorie_trajet') }}">Categorie des Trajets</a>
                                            </li> 
                                            <li class="@if(isset($classe_details_trajet)) active @endif">
                                                <a href="{{ URL::route('backoffice_detail_trajet') }}">Détails des Trajets</a>
                                            </li>                                            
                                        </ul>
                                </li>
                                <li class="@if(isset($classe_types_marchandises)) active @endif">
                                    <a href="{{ URL::route('backoffice_type_marchandise') }}"></i> Types des marchandises</a>
                                </li>
                                <li class="@if(isset($classe_unites)) active @endif">
                                    <a href="{{ URL::route('backoffice_unites') }}">Unités</a>
                                </li>
                                <li class="@if(isset($classe_marchandises)) active @endif">
                                    <a href="{{ URL::route('backoffice_marchandises') }}">Marchandises</a>
                                </li>
                                <li class="@if(isset($classe_util)) active @endif" >
                                    <a href="">Utilisation</a>
                                    <ul>
                                        <li class="@if(isset($classe_direction)) active @endif">
                                                    <a href="{{ URL::route('backoffice_directions') }}">Directions</a>
                                        </li> <li class="@if(isset($classe_departement)) active @endif">
                                            <a href="{{ URL::route('backoffice_departements') }}">Départements</a>
                                        </li>
                                        <li class="@if(isset($classe_service)) active @endif">
                                            <a href="{{ URL::route('backoffice_services') }}">Sérvices</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!--Ressources humaines-->
                        <li class="@if(isset($classe_rh)) active @endif">
                                <a href="">Ressources humaines</a>
                                <ul>
                                    <li class="@if(isset($classe_cat_postes)) active @endif" >
                                        <a href="{{route('backoffice_cat_postes')}}">Catégories des postes</a>
                                    </li>
                                    <li class="@if(isset($classe_contrat)) active @endif">
                                            <a href="{{route('backoffice_contrat')}}">Types des contrats</a>
                                    </li>
                                    <li class="@if(isset($classe_poste)) active @endif">
                                        <a href="{{route('backoffice_poste')}}">Types des postes</a>
                                    </li>
                                   
                                    <li class="@if(isset($classe_rubrique)) active @endif">
                                        <a href="{{route('backoffice_rubrique')}}">Rubriques</a>
                                    </li>
                                    <li class="@if(isset($classe_abs)) active @endif">
                                            <a href="{{route('backoffice_absence')}}">Types des absences</a>
                                    </li>
                                   
                                </ul>
                        </li>
                        <!--Juridique-->
                        <li class="@if(isset($classe_juridique)) active @endif" >
                                <a href="">Juridique</a>
                                <ul>
                                    <li class="@if(isset($classe_sinistre)) active @endif" >
                                        <a href="">Sinistre</a>
                                        <ul>
                                            <li class="@if(isset($classe_cat_accident)) active @endif" >
                                                <a href="{{route('backoffice_cat_details_accident')}}">Catégories détails d'accident</a>
                                            </li>    
                                            <li class="@if(isset($classe_type_detail)) active @endif" >
                                                    <a href="{{route('backoffice_types_details_accident')}}">Types détails d'accident</a>
                                            </li> 
                                            <li class="@if(isset($classe_type_degat)) active @endif" >
                                                    <a href="{{route('backoffice_types_degats')}}">Types des dégâts</a>
                                            </li> 
                                        </ul>
                                    </li>                                    
                                    <li class="@if(isset($classe_vt)) active @endif" >
                                            <a href="">Visite Technique</a>
                                            <ul>
                                                <li class="@if(isset($classe_type_vt)) active @endif" >
                                                    <a href="{{route('backoffice_types_vt')}}">Types Visite Techniques</a>
                                                </li>    
                                                <li class="@if(isset($classe_freq_vt)) active @endif" >
                                                        <a href="{{route('backoffice_freq_vt')}}">Fréquences visite techniques</a>
                                                </li>                                                
                                            </ul>
                                    </li>
                                    <li class="@if(isset($classe_assurance)) active @endif" >
                                        <a href="">Assurance</a>
                                        <ul>
                                            <li class="@if(isset($classe_sa)) active @endif" >
                                                <a href="{{route('backoffice_societes_assurance')}}">Sociétés d'assurance</a>
                                            </li>    
                                                  
                                            <li class="@if(isset($classe_ca)) active @endif" >
                                                    <a href="{{route('backoffice_courtiers_assurance')}}">Courtiers d'assurance</a>
                                            </li> 
                                        </ul>
                                </li>
                                <li class="@if(isset($classe_infraction)) active @endif" >
                                        <a href="">Infractions</a>
                                        <ul>
                                            <li class="@if(isset($classe_ti)) active @endif" >
                                                <a href="{{route('backoffice_types_infractions')}}">Types d'infractions</a>
                                            </li>    
                                            <li class="@if(isset($classe_i)) active @endif" >
                                                    <a href="{{route('backoffice_infractions')}}">Infractions</a>
                                                </li>      
                                             
                                        </ul>
                                </li>
                                    </ul>
                        </li>
                         <!--Intervention-->
                         <li class="@if(isset($classe_intervention)) active @endif" >
                            <a href="">Interventions</a>
                            <ul>
                                <li class="@if(isset($classe_di)) active @endif" >
                                    <a href="">Demande d'intervention</a>
                                    <ul>
                                        <li class="@if(isset($classe_gravite)) active @endif" >
                                            <a href="{{route('backoffice_gravites')}}">Gravités des demandes d'intervention</a>
                                        </li>    
                                        <li class="@if(isset($classe_urgence)) active @endif" >
                                                <a href="{{route('backoffice_urgences')}}"> Urgences des demandes d'intervention</a>
                                        </li> 
                                        <li class="@if(isset($classe_cat_inter)) active @endif" >
                                                <a href="{{route('backoffice_categories_interventions')}}"> Catégories des demandes d'intervention</a>
                                        </li> 
                                    </ul>
                                </li>   
                                <li class="@if(isset($classe_inter)) active @endif" >
                                        <a href="">Intervention</a>
                                    <ul>
                                        <li class="@if(isset($classe_garage)) active @endif" >
                                                <a href="{{route('backoffice_garages')}}">Garages</a>
                                        </li>                                      
                                        <li class="@if(isset($classe_fournisseur)) active @endif">
                                            <a href="{{route('backoffice_fournisseurs')}}">Centres de visite technique</a>
                                        </li>
                                        <li class="@if(isset($classe_FI)) active @endif">
                                                <a href="{{route('backoffice_familles_intervention')}}">Familles d'intervention</a>
                                        </li>
                                        <li class="@if(isset($classe_CFI)) active @endif">
                                                <a href="{{route('backoffice_categories_famille')}}">Categories de famille d'intervention</a>
                                        </li>
                                        <li class="@if(isset($classe_SC)) active @endif">
                                                <a href="{{route('backoffice_sous_categories_famille')}}">Sous categories de famille d'intervention</a>
                                        </li>
                                        <li class="@if(isset($classe_CP)) active @endif">
                                                <a href="{{route('backoffice_categorie_priseencharge')}}">Categorie prise en charge</a>
                                        </li>
                                    </ul>
                                   
                                </li> 
                                <li class="@if(isset($classe_intervenant)) active @endif">
                                    <a href="">Intervenants</a>
                                    <ul>
                                        <li class="@if(isset($classe_intervnt)) active @endif" >
                                            <a href="{{route('backoffice_intervenants')}}">Intervenants</a>
                                        </li>
                                        <li class="@if(isset($classe_cat_intervnt)) active @endif" >
                                            <a href="{{route('backoffice_categories_intervenants')}}">Catégories des intervenants</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="@if(isset($classe_piece)) active @endif">
                                <a href="">Pièces</a>
                                <ul>
                                    <li class="@if(isset($classe_famille_categorie)) active @endif">
                                        <a href="">Familles et catégories</a>
                                        <ul>
                                            <li class="@if(isset($classe_famille)) active @endif">
                                                <a href="{{route('backoffice_familles')}}">Familles</a>
                                            </li>
                                            <li class="@if(isset($classe_categorie)) active @endif">
                                                <a href="{{route('backoffice_categories_pieces')}}">Catégories</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="@if(isset($classe_nature_piece)) active @endif">
                                        <a href="{{route('backoffice_natures_pieces')}}">Nature des pièces</a>
                                    </li>
                                    <li class="@if(isset($classe_marque_piece)) active @endif">
                                            <a href="{{route('backoffice_marques_pieces')}}">Marques</a>
                                    </li>
                                    <li class="@if(isset($classe_magasin)) active @endif">
                                            <a href="{{route('backoffice_magasins')}}">Magasins</a>
                                    </li>
                                    <li class="@if(isset($classepiece)) active @endif">
                                        <a href="{{route('backoffice_pieces')}}">Pièces</a>
                                    </li>
                                </ul>
                                </li>                                
                            </ul>
                        </li>
                         <!--Consommations-->
                        <li class="@if(isset($classe_consommation)) active @endif" >
                                <a href="">Consommations</a>
                                <ul>
                                    <li class="@if(isset($classe_con_carburant)) active @endif" >
                                        <a href="">Consommations de carburant</a>
                                        <ul>
                                            <li class="@if(isset($classe_station)) active @endif" >
                                                <a href="{{route('backoffice_stations')}}">Stations</a>
                                            </li>
                                            <li class="@if(isset($classe_four_carb)) active @endif">
                                                <a href="{{route('backoffice_fournisseurs_carburant')}}">Fournisseurs de carburant</a>
                                            </li>   
                                            <li class="@if(isset($classe_type_paiement)) active @endif">
                                                <a href="{{route('backoffice_types_paiement')}}">Types de paiement</a>
                                            </li>
                                            <li class="@if(isset($classe_tp_citerne)) active @endif">
                                                <a href="{{route('backoffice_types_produit_citerne')}}">Types de produit citerne</a>
                                            </li>
                                            <li class="@if(isset($classe_serv_station)) active @endif">
                                                <a href="{{route('backoffice_service_station')}}">Service-station</a>
                                            </li>
                                            <li class="@if(isset($classe_tarifs)) active @endif">
                                                <a href="{{route('backoffice_tarifs_gasoil')}}">Tarifs de gasoil</a>
                                            </li>
                                        </ul>
                                    </li>   
                                    <li class="@if(isset($classe_carte_cons)) active @endif">
                                        <a href="">Cartes de consommation</a>
                                        <ul>
                                            <li class="@if(isset($classe_fourn_carte)) active @endif">
                                                <a href="{{route('backoffice_fournisseur_cartes')}}">Fournisseurs de cartes</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="@if(isset($classe_depenses)) active @endif">
                                        <a href="">Dépenses diverses</a>
                                        <ul>
                                            <li class="@if(isset($classe_categories_depenses)) active @endif">
                                                <a href="{{route('backoffice_categories_depenses_vehicules')}}">Catégories des dépenses des véhicules</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="@if(isset($classe_peage_auto)) active @endif">
                                        <a href="">Péages autoroute</a>
                                        <ul>
                                            <li class="@if(isset($classe_peage)) active @endif">
                                                <a href="{{route('backoffice_peages_autoroute')}}">Péages autoroute</a>
                                            </li>
                                            <li class="@if(isset($classe_tarifs_auto)) active @endif">
                                                <a href="{{route('backoffice_tarifs')}}">Tarifs</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="@if(isset($classe_fournisseurs)) active @endif">
                                        <a href="{{route('backoffice_liste_fournisseurs')}}">Fournisseurs</a>
                                    </li>
                                </ul>
                                
                        </li>
                         <!--Classement des véhicules-->
                         <li class="@if(isset($classe_classement)) active @endif" >
                                <a href="">Classement des véhicules</a>
                                <ul>
                                    <li class="@if(isset($classe_class)) active @endif" >
                                        <a href="">Classement des véhicules</a>
                                        <ul>
                                            <li class="@if(isset($classe_categories_vehicules)) active @endif" >
                                                <a href="{{route('backoffice_categories_vehicules')}}">Catégories des véhicules</a>
                                            </li>
                                            <li class="@if(isset($classe_parc)) active @endif">
                                                <a href="{{route('backoffice_parcs')}}">Parcs</a>
                                            </li>
                                            <li class="@if(isset($classe_marque)) active @endif">
                                                <a href="{{route('backoffice_marques')}}">Marques</a>
                                            </li>
                                            <li class="@if(isset($classe_confort)) active @endif">
                                                <a href="{{route('backoffice_conforts')}}">Conforts</a>
                                            </li>
                                            <li class="@if(isset($classe_gamme)) active @endif">
                                                <a href="{{route('backoffice_gammes')}}">Gammes</a>
                                            </li>
                                            <li class="@if(isset($classe_energie)) active @endif">
                                                <a href="{{route('backoffice_energies')}}">Energies</a>
                                            </li>
                                            <li class="@if(isset($classe_modele)) active @endif">
                                                <a href="{{route('backoffice_modeles')}}">Modèles</a>
                                            </li>
                                            <li class="@if(isset($classe_types_semi_remorque)) active @endif">
                                                <a href="{{route('backoffice_types_semi_remorques')}}">Types des semi-remorques</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="@if(isset($classe_equi)) active @endif" >
                                        <a href="">Equipements des véhicules</a>
                                        <ul>
                                            <li class="@if(isset($classe_type_equi)) active @endif" >
                                                <a href="{{route('backoffice_types_equipement_vehicule')}}">Type d'équipement de véhicule</a>
                                            </li>
                                            <li class="@if(isset($classe_equi_vehicul)) active @endif">
                                                <a href="{{route('backoffice_equipement_vehicule')}}">Equipement de véhicule</a>
                                            </li>
                                        </ul>                                       
                                    </li> 
                                    <li class="@if(isset($classe_reforme)) active @endif" >
                                            <a href="{{route('backoffice_reformes')}}">Réformes</a>
                                    </li>
                                    <li class="@if(isset($classe_contrat)) active @endif">
                                        <a href="">Contrats</a>
                                        <ul>
                                            <li class="@if(isset($classe_four_vehicule)) active @endif">
                                                <a href="{{route('backoffice_fournisseur_vehicules')}}">Fournisseurs de véhicules</a>
                                            </li>
                                            <li class="@if(isset($classe_type_acquisition)) active @endif">
                                                <a href="{{route('backoffice_types_acquisition')}}">Types d'aquisition</a>
                                            </li>
                                        </ul>
                                    </li>  
                                 
                                </ul>
                        </li>
                         <!--Transport-->
                         <li class="@if(isset($classe_transprt)) active @endif" >
                                <a href="">Transport</a>
                                <ul>
                                    <li class="@if(isset($classe_echeance)) active @endif" >
                                        <a href="{{route('backoffice_echeances')}}">Echéances</a>
                                    </li>
                                    <li class="@if(isset($classe_client)) active @endif" >
                                            <a href="{{route('backoffice_clients')}}">Clients</a>
                                    </li>
                                    <li class="@if(isset($classe_transitaire)) active @endif" >
                                        <a href="{{route('backoffice_transitaires')}}">Transitaires</a>
                                    </li>
                                    <li class="@if(isset($classe_prestataire)) active @endif">
                                        <a href="{{route('backoffice_prestataires')}}">Prestataires</a>
                                    </li>
                                    <li class="@if(isset($classe_exportateurs_importateurs)) active @endif">
                                        <a href="{{route('backoffice_exportateurs_importateurs')}}">Exportateurs & Importateurs</a>
                                    </li>
                                </ul>
                        </li>
                        <!--Calendrier-->                       
                        <li class="@if(isset($classe_calendar)) active @endif">
                            <a href="{{route('backoffice_calendar')}}">Calendrier</a>
                        </li>
                    </ul>

            </li>
            <!--Administration-->
            <li class="@if(isset($classe_administration)) active @endif">
                <a href=""><i class="fa fa-lg fa-fw fa-gears"></i> <span class="menu-item-parent">Administration </span></a>
                   <ul>
                       <!--Utilisateurs-->
                       @role('Administrateur')
                       <li class="@if(isset($classe_autorisation)) active @endif" >
                               <a href="">Gestion des autorisations</a>
                               <ul>
                               <li class="@if(isset($classe_users)) active @endif">
                                   <a href="{{route('backoffice_utilisateurs')}}">Gestion des Utilisateurs</a>
                               </li>
                               <li  class="@if(isset($classe_role)) active @endif">
                                    <a href="{{URL::route('backoffice_roles')}}">Roles</a>
                                </li>
                              
                           </ul>
                       </li>
                       @endrole
                       <!--Paramétrage-->
                      <li class="@if(isset($classe_parametrage)) active @endif">
                          <a href="">Paramétrage</a>
                          <ul>
                              <li class="@if(isset($classe_mon_devise)) active @endif">
                                  <a href="{{URL::route('backoffice_monnaie_devise')}}">Monnaie & devise</a>
                              </li>
                              @role('Administrateur')
                              <li class="@if(isset($classe_acces)) active @endif">
                                  <a href="{{ URL::route('backoffice_operation') }}">Opération</a>
                              </li>
                              @endrole
                          </ul>
                      </li>
                   </ul>

            </li>           
        </ul>
    </nav>


</aside>

