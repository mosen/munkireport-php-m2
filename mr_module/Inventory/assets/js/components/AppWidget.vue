<template>
    <div class="panel panel-default app-widget">
        <div class="panel-heading" data-container="body" :title="$('widget.app.versions', name)">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-ice-lolly-tasted"></i>
                <span>{{ name }}</span>
            </h3>
        </div>
        <div class="list-group scroll-box">
            <a v-for="version in versions" class="list-group-item" :href="url">
                {{ version.version }}
                <span class="badge pull-right">{{ version.count }}</span>
            </a>
        </div>
    </div>
</template>

<script>
// Normally this widget would create x widgets for the length of apps you had in the inventory.
// This is a single app item, see AppsLayout for multi app widget layout.

export default {
  props: {
    url: String,
    name: String,
    versions: Array
  }
}
</script>