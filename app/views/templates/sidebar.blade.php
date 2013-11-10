<div class="list-group">
    @foreach($tags as $tag)
        <?php $active = ((isset($tagActive)) && ($tagActive == $tag->slug)) ? "active" : ""; ?>
        {{ link_to_route('tags.show', $tag->name, [$tag->slug], ['class' => "list-group-item {$active}"]) }}
    @endforeach
</div>
