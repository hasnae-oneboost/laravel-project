
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Informations tracteur N°{{$tracteurs->code}}</title>
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
            float: left ;
            
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
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
        }

        table th,
        table td {
        padding: 15px;
        background: #EEEEEE;
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
          <div class="to">Tracteur:</div>
          <h2 class="name">{{$tracteurs->immatriculation}}</h2>
        </div>
      </div>
      
    <div id="block_container">
    <div id="info">
      <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <th>Code</th>
                <th>Marque</th>
                <th>Immatriculation</th>
                <th>Gamme</th>
                <th>Confort</th>
                <th>Catégorie</th>
                <th>Modèle</th>
                <th>Description</th>                
            </tr>
            <tr>
                <td>{{$tracteurs->code}}</td>
                <td>{{$tracteurs->marque->marque}}</td>
                <td>{{$tracteurs->immatriculation}}</td>
                <td>{{$tracteurs->gamme->gamme}}</td>
                <td>{{$tracteurs->confort->nom}}</td>
                <td>{{$tracteurs->categorie->libelle}}</td>
                <td>{{$tracteurs->modele->nom}}</td>
                <td>{{$tracteurs->description}}</td>
            </tr>
      </table>
    </div>
    <div id="doc">
      <table class="documents" border="0" cellspacing="0" cellpadding="0">
            <tr>
                    <th>Type document</th>
                    <th>Date</th>
                    <th>Date d'expiration</th>
                </tr>
                @foreach($documentstracteurs as $doc)
                <tr>
                    <td>{{$doc->document}}</td>
                    <td>{{$doc->date}}</td>
                    <td>{{$doc->date_expiration}}</td>
                </tr>
                @endforeach
      </table>
    </div>
    <h2 class="title">Images</h2><br>
    <div id="images">
        <br><br>
            @foreach($tracteurphotos as $phototracteur)
            <img src="{{public_path("images_tracteur/".$phototracteur->photo)}}" alt="" height="50%" width="50%">
            @endforeach
    </div>
    </div>
    </main>
  </body>
</html>