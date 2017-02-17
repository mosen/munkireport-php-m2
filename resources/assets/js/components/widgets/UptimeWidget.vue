<template>
    <div class="panel panel-default" id="uptime-widget">
        <div class="panel-heading" data-container="body">
            <h3 class="panel-title">
                <i class="glyphicon glyphicon-off"></i>
                <span>{{ $t('widget.uptime.title') }}</span>
            </h3>
        </div>
        <div class="panel-body text-center">
            <a :href="url" class="btn btn-danger">
                <span class="bigger-150">{{ oneweekplus }}</span>
                <br>
                7 <span>{{ $t('date.day_plural') }}</span> +
            </a>
            <a :href="url" class="btn btn-warning">
                <span class="bigger-150">{{ oneweek }}</span>
                <br>
                &lt; 7 <span>{{ $t('date.day_plural') }}</span>
            </a>
            <a :href="url" class="btn btn-success">
                <span class="bigger-150">{{ oneday }}</span>
                <br>
                &lt; 1 <span>{{ $t('date.day') }}</span>
            </a>
        </div>
    </div>
</template>

<script>
    import { API_ROOT } from '../../constants';

    export default {
        data() {
            return {
                oneweekplus: 0,
                oneweek: 0,
                oneday: 0,
                url: '/clients'
            }
        },
        mounted () {
            this.axios.get(`${API_ROOT}/stats/uptime`).then((response) => {
                if (response.data) {
                    this.oneweekplus = response.data.oneweekplus;
                    this.oneweek = response.data.oneweek;
                    this.oneday = response.data.oneday;
                }
            })
        }
    }
</script>