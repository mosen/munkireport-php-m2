<template>
    <div class="panel panel-default" id="client-widget">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-group"></i>
                <span>{{ $t('client.activity') }}</span>
            </h3>
        </div>
        <div class="panel-body">
            <svg id="test1" class="center-block"></svg>
            <div class="text-muted text-center">
                <span>{{ $t('client.total') }}</span>: <span class="total-clients"></span> <span class="total-change"></span>
                |
                <span>{{ $t('client.hour') }}</span>: <span class="hour-clients"></span> <span class="lasthour-change"></span>
            </div>

        </div>

    </div>
</template>

<script>
    export default {
        data () {
          return {
            total: 0,
            lasthour: 0
          }
        }
    }
</script>