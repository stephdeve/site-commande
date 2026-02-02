<h1><?= $params['post']->title ?></h1>
<div>
    <?php foreach($params['post']->getTag() as $tag):?>
        <span class="text-success"><?= $tag->name ?></span>
    <?php endforeach ?>
            
</div>
<p><?= $params['post']->content ?></p>
<a href="/posts" class="btn btn-secondary">Retourner en arrière</a>
 
