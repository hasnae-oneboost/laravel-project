
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informations de demande d'intervention ID N°{{$demandes->id}} </title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
<style>
        @font-face {
        font-family: SourceSansPro;
        src: url(SourceSansPro-Regular.ttf);
        }

        .clearfix:after {
        content: "";
        display: table;
        clear: both;
        }

        a {
        color: #0087C3;
        text-decoration: none;
        }

        body {
        position: relative;
        width: auto;  
        height: auto; 
        margin: 0 auto; 
        color: #555555;
        background: #FFFFFF; 
        font-family: Arial, sans-serif; 
        font-size: 14px; 
        font-family: SourceSansPro;
        }

        header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #e9212e;
        }

        #logo {
        float: right;
        margin-top: 8px;
        }

        #logo img {
        height: 60px;
        width: 100px;
        }

        #company {
        float: left;
        text-align: left;        
        }
        #email{
            font-weight: bold; 
            color: #333;
        }


        #details {
        margin-bottom: 15px;
        }

        #client {
        padding-left: 6px;
        border-left: 6px solid #e9212e;
        float: left;
        }

        #client .to {
        color: #777777;
        }

        #images{
            float: right ;
            
        }
        #images img {
            height: 150px;
            width: 150px;  
        }

        h2.name {
        font-size: 1.4em;
        font-weight: normal;
        margin: 0;
        }
        h2.title {
        font-size: 1.4em;
        font-weight: normal;
        margin: 0;
        border-bottom: 1px solid #e9212e;
        }

        #invoice {
        float: right;
        text-align: right;
        position: relative;
        }

        #invoice h1 {
        color: #0087C3;
        font-size: 2.4em;
        line-height: 1em;
        font-weight: normal;
        margin: 0  0 10px 0;
        }

        #invoice .date {
        font-size: 1.1em;
        color: #777777;
        }

        table {
        width: 70%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
        }

        table th,
        table td {
        padding: 15px;
        background: #fafafa;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;
        }

        table th {
        white-space: nowrap;        
        font-weight: normal;
        text-decoration-style: solid;
        font-weight: bold;        
        }

        table td {
        text-align: left;
        }
       
        footer {
        color: #777777;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #e9212e;
        padding: 8px 0;
        text-align: center;
        }
        .container{
        margin:0;
        /*dfghyjukgh*/
        }
        .info{
        float:left;
        width:75%;
        overflow:hidden;
        }
        .details{
        float:left;
        width:25%;
        overflow:hidden;
        } 
        #signature {
        display: flex;
        
        }
        #chef_parc {
            float: right;
            width: 200px;            
        }
        #demandeur {
            float: left;
        }
        .sign{
            position: fixed;
            bottom: 25%;
        }
            
</style>
<body>
    <header class="clearfix">
            <div id="logo">
                    <img src="images/{{$entreprise->logo_document}}" alt="logo_entreprise" height="60px" width="100px">
            </div>
      <div id="company">
        <h2 class="name">{{$entreprise->raison_sociale}}</h2>
       
        <div>{{$entreprise->adresse}}</div>
        <div>{{$entreprise->telephone}}</div>
        <div id="email">{{$entreprise->email}}</div>        
        <div id="site">                     
            www.dshtrans.com</div>
              
      </div>
      </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">Matricule du véhicule:</div>
                <h2 class="name">{{$demandes->vehicule->immatriculation}}</h2>
            </div>
        </div>
       <section class="container">                 
            <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <th>Vehicule</th>
                        <td>{{$demandes->vehicule->immatriculation}}</td>
                    </tr>
                    <tr>    
                        <th>Description</th>
                        <td>{{$demandes->description}}</td>
                    </tr>
                    <tr>
                        <th>Date de la demande</th>
                        <td>{{$demandes->date_demande}}</td>
                    </tr>
                    <tr>
                        <th>Kilométrage</th>
                        <td>{{$demandes->kilometrage}} Km</td>
                        
                    </tr>
                    <tr>
                        <th>Index Horaire</th>
                        <td>{{$demandes->index_horaire}}</td>                
                    </tr>
                    <tr>
                        <th>Catégorie</th>
                        <td>{{$demandes->categorie}}</td>                
                    </tr>
                    <tr>
                        <th>Gravité</th>
                        <td>{{$demandes->gravit->libelle}}</td>                
                    </tr>
                    <tr>
                        <th>Urgence</th> 
                        <td>{{$demandes->urgenc->libelle}}</td>                
                    </tr>
                 
                    
            </table>
            </div>
        </section>

        <section class="sign">
            <div id="signature">
                    <div id="demandeur">
                            <div class="to">Demandeur:</div>
                            <h2 class="name">{{$demandes->demandeur->nom}}&nbsp;{{$demandes->demandeur->prenom}}</h2>
                    </div>
                    <div id="chef_parc">
                            <div class="to">Chef de parc:</div>
                            <h2 class="name"></h2>                 
                    </div>
            </div>
        </section>
    </main>
    
  </body>
</html>