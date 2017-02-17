<template>
    <div class="panel panel-default" id="events-widget">
        <div class="panel-heading" data-container="body" :title="$t('events.widget_title')">
            <h3 class="panel-title"><i class="fa fa-bullhorn"></i> <span>{{ $t('event_plural') }}</span></h3>
        </div>
        <div class="list-group scroll-box" style="max-height: 308px">
            <span v-if="items.length === 0" class="list-group-item">No messages</span>
            <template v-else>
                <a v-for="item in items" class="list-group-item" :href="url(item.serial_number)">
                    <span class="pull-right" style="padding-left: 10px">{{ fromNow(item.updated_at) }}</span>
                    <i class="glyphicon glyphicon-alert"></i>
                    <span class="hidden-xs"> | </span>
                    <br class="visible-xs-inline">
                    {{ item.module }} {{ $t(item.msg) }}
                </a>
            </template>
            <span v-if="error" class="list-group-item list-group-item-danger">Request Failed</span>
            
        </div>
    </div>
</template>

<script>
  import {API_ROOT} from '../../constants';
  import moment from 'moment';

  export default {
    data: {
      items: [],
      limit: 50,
      error: false
    },
    created () {
      this.axios.get(`${API_ROOT}/events?limit=${this.limit}`).then((response) => {
        this.items = response;
      })
    },
    methods: {
      url: function(serialNumber) {
        return `/clients/detail/${serialNumber}`;
      },
      fromNow: function(relativeDate) {
        return moment(relativeDate).fromNow();
      }
    }
  }
</script>