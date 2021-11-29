
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Diagnostic {{$diagnostics->id}}</title>
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
        margin: 5px;
        border-bottom: 0.5px solid #e9212e;
        width: 50%;
        }

        #invoice {
        float: right;
        text-align: right;
        position: relative;
        }

  
        table {
        width: 50%;
        border-collapse: collapse;        
        }

        
        th {
        padding: 10px;   
        }
        td {
        padding: 10px;   
        }
        .tables{
            position: static;
        }
        div>table.t{
            float: left;
        }

        
        div>table.t2{
            float: left;
        }

        section:after {
            content: "";
            display: table;
            clear: both;
        }

        .table_details{
            width: 100%;
        border-collapse: collapse;                    
        border: 1px solid;

        }
        .table_details th{
        border: 1px solid;
        }
        .table_details td{
        border: 1px solid;
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
        <h1>Diagnostic {{$diagnostics->id}}</h1>
        
        <section>
        <div class="tables">
            <table class="t">
                    <tr>
                            <th>Demande N°</th>
                            <td>:&nbsp;   {{$diagnostics->demande->numero_systeme}}</td>
                    </tr>
                    <tr>
                            <th>Vehicule</th>
                            <td>:&nbsp;   {{$diagnostics->vehicule->immatriculation}}</td>
                    </tr>   
                    <tr>
                            <th>Demandeur</th>
                            <td>:&nbsp;   {{$diagnostics->demandeur->nom}}&nbsp;{{$diagnostics->demandeur->prenom}}</td>
                    </tr>                  
            </table>
        </div>

        <div class="tables">
            <table class="t" >
                <tr>
                        <th>Date DI</th>
                        <td>:   {{$diagnostics->demande->date_demande}}</td>
               </tr>
                <tr>
                    <th>Marque</th>
                    <td>:&nbsp;   {{$diagnostics->vehicule->marque->marque}}</td> 
                </tr>
                <tr>
                        <th>Matricule</th>
                        <td>:&nbsp;   {{$diagnostics->demandeur->matricule}}</td> 
                    </tr>
                
            </table>

        </div>

        </section>
        <br><br>
        <header style="width: 80%; float: right; display: inline; margin-top: 12px"></header>
        <br><br>
        
        <section>
        <div class="tables">
            <table class="t">
                <tr>
                    <th>Date</th>
                    <td>:&nbsp;{{$diagnostics->demande->date_demande}}</td> 
                </tr>
            </table>
        </div>
        <div class="tables">
                <table class="t">
                    <tr>
                        <th>Kilométrage</th>
                        <td>:&nbsp;{{$diagnostics->demande->kilometrage}}</td> 
                        
                    </tr>
                    <tr>
                            <th>Index Horaire</th>
                            <td>:&nbsp;{{$diagnostics->demande->index_horaire}}</td> 
                            
                    </tr>
                </table>
            </div>
        </section>
        <br><br>
        <legend style="float: left; font-size: 1.2em;">Détails diagnostic</legend><header style="width: 80%; float: right; display: inline; margin-top: 12px"></header>
        <br><br>
        <section>
            <div>
                <table class="table_details">
                    <tr>
                        <th>Famille</th>
                        <th>Catégorie</th>
                        <th>Pièce</th>
                        <th>Unité</th>
                        <th>Quantité</th>
                        
                    </tr>
                    @foreach($diag as $d)
                
                    <tr>  
                                       
                        <td>{{$d->famille}}</td>
                        <td>{{$d->categorie}}</td>
                        <td>{{$d->piece}}</td>
                        <td>{{$d->unite}}</td>
                        <td></td>
                    </tr>
                                       
                    @endforeach
                </table>
            </div>
        </section>
        <br><br>
       <header style="width: 80%; float: right; display: inline; margin-top: 12px"></header>
        <br><br>
        <div>
            <form style="width: 40%; float: right">
                <legend><strong> Effectué par:</strong>&nbsp;&nbsp;Chef atelier</legend>
                <textarea ></textarea>
        </form>
        </div>
           
   
       
        
    </main>
  </body>
</html>