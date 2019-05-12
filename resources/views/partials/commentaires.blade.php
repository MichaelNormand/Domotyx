<form method="post" action="{{route("commentaires.soumettre", ["page" => "accueil"])}}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="prenom">Prénom:</label>
        <input class="form-control" id="prenom" type="text" name="prenom"
               placeholder="Entrez votre prénom..." value="{{old("prenom")}}"/>
    </div>
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input class="form-control" id="nom" type="text" name="nom" placeholder="Entrez votre nom..." value="{{old("nom")}}"/>
    </div>
    <div class="form-group">
        <label for="commentaire"><b>*</b> Message:</label>
        <textarea class="form-control" name="commentaire" id="commentaire"
                  placeholder="Écrivez votre message...">{{old("commentaire")}}</textarea>
    </div>
    <div class="form-group">
        <label for="courriel"><b>*</b> Email:</label>
        <input class="form-control" id="courriel" type="text" name="courriel"
               placeholder="votre@email.com" value="{{old("courriel")}}"/>
    </div>
    <button class="btn btn-outline-warning button-margin">Envoyer!</button>
</form>