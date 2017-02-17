<template>
    <a class="list-group-item" :href="url">
        <span class="pull-right" style="padding-left: 10px">{{ relativeTime }}</span>
        <i :class="iconClasses"></i>
        computer_name
        <span class="hidden-xs"> | </span>
        <br class="visible-xs-inline">
        {{ module }} {{ $t(msg) }}
    </a>
</template>

<script>
import moment from 'moment';

export default {
    props: [
        'serial',
        'module',
        'msg',
        'type',
        'data',
        'updated'
    ],
    computed: {
        url: function () {
            return `/client/details/${this.serial}`;
        },
        relativeTime: function () {
            if (this.updated_at) {
                return moment(this.updated).fromNow();
            } else {
                return '';
            }
        },
        tab: function () {
            return {
                'munkireport': '#tab_munki',
                'managedinstalls': '#tab_munki',
                'diskreport': '#tab_storage-tab',
                'certificate': '#tab_certificate-tab'
            }[this.module]
        },
        iconClasses: function () {
            return {
                'glyphicon': true,
                'glyphicon-remove-sign': this.type === 'danger',
                'glyphicon-exclamation-sign': this.type === 'warning',
                'glyphicon-info-sign': this.type === 'info',
                'glyphicon-ok-sign': this.type === 'success'
            }
        }
    }

//    data() {
//        return {
//            serial_number: '',
//            module: '',
//            msg: '',
//            data: '',
//            type: ''
//        }
//    }
}
</script>