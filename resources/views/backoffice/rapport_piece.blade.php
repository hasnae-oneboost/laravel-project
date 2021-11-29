
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Liste des pièces: Etat global du stock</title>
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
        color: #353434;
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

  
        table {
        width: 100%;
        border-collapse: collapse;        
        }

        table th, td {
        border: 1px solid;
        }
        th {
        padding: 10px;   
        }
        td {
        padding: 15px;   
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
        <h2>Liste des pièces: Etat global du stock</h2>
        <section >
        <table>
            <tr>
                    <th>Libelle</th>
                    <th>Famille</th>
                    <th>Catégorie</th>
                    <th>Unité</th>
                    <th>Prix</th>
                    <th>Quantité achetée</th>
                    <th>Quantité consomée</th>
                    <th>Quantité restante</th>
            </tr>
            @foreach($pieces as $p)
            <tr>
                    <td>{{$p->libelle}}</td>
                    <td>{{$p->famille->libelle}}</td>
                    <td>{{$p->categorie->libelle}}</td>
                    <td>{{$p->unite->libelle}}</td>
                    <td>{{$p->prix_ht}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
            </tr>
            @endforeach
        </table>
        </section>
    </main>
  </body>
</html>