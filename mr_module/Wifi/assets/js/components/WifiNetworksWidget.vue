<template>
    <div class="panel panel-default">
        <div class="panel-heading" data-container="body" >
            <h3 class="panel-title">
                <i class="fa fa-wifi"></i>
                <span>{{ $t('wifi.networks') }}</span>
            </h3>
        </div>
        <div class="list-group scroll-box">
            <a v-if="items.length > 0" v-for="item in items" :href="'/show/listing/wifi/#' + ssid" class="list-group-item">
                {{ item.ssid }}
                <span class="badge pull-right">{{ item.count }}</span>
            </a>
            <span v-else class="list-group-item">{{ $t('wifi.nonetworks') }}</span>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                items: [],

                error: false,
                errorDetail: {
                    status: 200,
                    message: ''
                }
            }
        }
    }
</script>