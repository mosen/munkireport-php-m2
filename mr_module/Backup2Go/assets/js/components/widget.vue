<template>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading" data-container="body">
                <h3 class="panel-title"><i class="fa fa-clock-o"></i> <span data-i18n="backup2go.widget.title"></span></h3>
            </div>

            <div class="list-group scroll-box">
                <a id="b2g-b2g_ok" :href="url" class="list-group-item list-group-item-success hide">
                    <span class="badge">0</span>
                    <span data-i18n="widget.timemachine.b2g_ok"></span>
                </a>
                <a id="b2g-b2g_warning" :href="url" class="list-group-item list-group-item-warning hide">
                    <span class="badge">0</span>
                    <span data-i18n="widget.timemachine.b2g_warning"></span>
                </a>
                <a id="b2g-b2g_danger" :href="url" class="list-group-item list-group-item-danger hide">
                    <span class="badge">0</span>
                    <span data-i18n="widget.timemachine.b2g_danger"></span>
                </a>
                <span id="b2g-nodata" data-i18n="no_clients" class="list-group-item"></span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            url: "/show/listing/backup2go"
        }
    }

}
</script>