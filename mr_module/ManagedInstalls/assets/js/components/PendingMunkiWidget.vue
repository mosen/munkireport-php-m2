<template>
    <div class="panel panel-default" id="pending-munki-widget">
        <div class="panel-heading" data-container="body" :title="$t('widget.pending_munki.tooltip')">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-shopping-cart"></i>
                <span data-i18n="widget.pending_munki.title">{{ $t('widget.pending_munki.title') }}</span>
            </h3>
        </div>
        <div class="list-group scroll-box">
            <template v-for="item in items">
                <a href="/x/managedinstalls" class="list-group-item">
                    {{ item.display_name || item.name }}
                    {{ item.version }}
                    <span class="badge pull-right">{{ item.count }}</span>
                </a>
            </template>
            <span v-if="items.length === 0 && !error" class="list-group-item">{{ $t('widget.munki.no_updates_pending') }}</span>
            <span v-if="error" class="list-group-item text-danger">An error occurred fetching items.</span>
        </div>
    </div>
</template>

<script>
    export default {
      data() {
        return {
          items: [],
          error: false,
          errorDetails: {
            status: 200,
            message: ''
          }
        }
      },
      created() {
        this.axios.get(`/xapi/managedinstalls/munki`).then((response) => {
          this.items = response.data;
        }).catch((response) => {
          this.error = true;
          this.errorDetails.status = response.status;
          this.errorDetails.message = response.message;
        });
      }
    }
</script>