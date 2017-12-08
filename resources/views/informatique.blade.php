@extends('layouts.headerHome')
@section('site')

<?php
  $nbNiveauxFaciles = 16; // Nombre de niveaux faciles
  $nbNiveauxMoyens = 14; // Nombre de niveaux moyens
  $nbNiveauxDifficiles = 17; // T'as compris

  //$lienJeu = "google-blockly/blockly/html/jeu.php";
 ?>

 <div class="container">
   <div class="row">
     <div class="col-lg-12">
       <p>Bienvenue sur la partie « Informatique » de Kinimi ! Ici, tu vas pouvoir jouer au jeu Escape-Colle&nbsp;: tu dois aider Kini à s'échapper de là où il se trouve, en lui indiquant les mouvements qu'il doit faire.</p>
       <dl class="dl-horizontal">
         <dt>Niveaux faciles</dt>
         <dd>Les niveaux faciles sont destinés à t'apprendre le fonctionnement du jeu Escape-Colle. Tu vas devoir utiliser les blocs de base pour déplacer ton personnage et terminer les niveaux.</dd>

         <dt>Niveaux moyens</dt>
         <dd>Les niveaux moyens vont commencer à te donner du fil à retordre. Utilise les boucles et les conditions pour déplacer ton personnage et éviter les pièges, et ne te fais pas repérer par les surveillants.</dd>

         <dt>Niveaux difficiles</dt>
         <dd>Les niveaux difficiles sont difficiles. Je sais pas quoi dire d'autre, alors je dis rien d'autre. Voilà. Allez, arrête de lire. Arrête je te dis putain. Mais tu le fais exprès ou quoi ? T'as vraiment l'air con là !</dd>
       </dl>
     </div> <!-- col -->
   </div> <!-- row -->
 </div> <!-- container -->

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2>Didacticiel</h2>
      <a href="{{ route('launchGame', ['id' => 0]) }}" class="btn btn-success btn-lg btn-block">Accéder au didacticiel</a>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h2>Niveaux faciles</h2>
      <?php
      for($i = 1; $i <= $nbNiveauxFaciles; $i++) {
<<<<<<< HEAD
        $numNiveau = $i;
        $lien = $lienJeu."?lvl=".$numNiveau; ?>
          <a href="<?php echo $lien; ?>" class="btn btn-success btn-lg  btn-block">Niveau <?php echo $i; ?></a>
=======
        $numNiveau = $i; ?>
        <a href="{{ route('launchGame', ['id' => $numNiveau]) }}" class="btn btn-success btn-lg  btn-block">Niveau <?php echo $i; ?></a>
>>>>>>> 6e32036cd0933d00fab83f4eb5ee4621ccd9761f
      <?php } ?>
    </div> <!-- col -->
    <div class="col-md-4">
      <h2>Niveaux moyens</h2>
      <?php
      for($i = 1; $i <= $nbNiveauxMoyens; $i++) {
        $numNiveau = $i + $nbNiveauxFaciles; ?>
        <a href="{{ route('launchGame', ['id' => $numNiveau]) }}" class="btn btn-warning btn-lg  btn-block">Niveau <?php echo $i+$nbNiveauxFaciles; ?></a>
      <?php } ?>
    </div> <!-- col -->
    <div class="col-md-4">
      <h2>Niveaux difficiles</h2>
      <?php
      for($i = 1; $i <= $nbNiveauxDifficiles; $i++) {
        $numNiveau = $i + $nbNiveauxFaciles + $nbNiveauxMoyens;?>
        <a href="{{ route('launchGame', ['id' => $numNiveau]) }}" class="btn btn-danger btn-lg  btn-block">Niveau <?php echo $i+$nbNiveauxFaciles+$nbNiveauxMoyens; ?></a>
      <?php } ?>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->

@endsection
