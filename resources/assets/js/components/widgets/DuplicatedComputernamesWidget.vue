<template>
    <panel>
        <i slot="title" class="glyphicon glyphicon-warning-sign"></i>
        <span slot="title">{{ $t('widget.duplicate_computernames.title') }}</span>

        <template v-if="items.length > 0" v-for="item in items">
            <a v-if="!item.computer_name" class="list-group-item">
                {{ $t('empty') }}
                <span class="badge pull-right">{{ item.count }}</span>
            </a>
            <a v-else href="/show/listing/clients/computer_name" class="list-group-item">
                {{ item.computer_name }}
                <span class="badge pull-right">{{ item.count }}</span>
            </a>
        </template>
        <span v-else class="list-group-item">{{ $t('widget.duplicate_computernames.notfound') }}</span>
    </panel>
</template>

<script>
    import Panel from '../bootstrap/Panel.vue';

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
        components: {
            'Panel': panel
        },
        created() {
            this.axios.get(`/xapi/stats/machine/duplicate_computernames`).then((response) => {
                if (response.data) {
                    this.items = response.data;
                }
            }).catch((response) => {
                this.error = true;
                this.errorDetails = {
                    status: response.status,
                    message: response.message
                };
            })
        }
    }
</script>