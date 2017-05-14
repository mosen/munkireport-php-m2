<template>
    <div class="dashboard">
        <div class="row" v-for="(row, ridx) in widgets(page)">
            <div class="widget-container" v-for="(widget, cidx) in row" :key="widget">
                <div class="widget-controls">
                    <span class="glyphicon glyphicon-remove widget-close" aria-hidden="true" @click.prevent="removeWidget(ridx, cidx)"></span>
                </div>
                <Widget :widget="widget" :row="ridx" :column="cidx"/>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapMutations, mapActions} from 'vuex';
    import Widget from './Widget';
    import * as Core from './widgets';

    // TODO: dynamic inclusion/registration somehow
    import * as Disk from 'MrModules/DiskReport/assets/js/widgets';
    import * as DirSvc from 'MrModules/DirectoryService/assets/js/widgets';
    import * as Btg from 'MrModules/Backup2Go/assets/js/widgets';
    import * as Bt from 'MrModules/Bluetooth/assets/js/widgets';
    import * as Cert from 'MrModules/Certificate/assets/js/widgets';
    import * as Cp from 'MrModules/CrashPlan/assets/js/widgets';
    import * as Disp from 'MrModules/Display/assets/js/widgets';
    import * as Fmm from 'MrModules/FindMyMac/assets/js/widgets';
    import * as Mi from 'MrModules/ManagedInstalls/assets/js/widgets';
    import * as Mr from 'MrModules/MunkiReport/assets/js/widgets';
    import * as Tm from 'MrModules/TimeMachine/assets/js/widgets';
    import * as Wifi from 'MrModules/Wifi/assets/js/widgets';

    import './Dashboard.scss';

    export default {
        methods: {
            ...mapMutations('dashboard', [
                'removeWidget'
            ]),
            ...mapActions('stats', ['fetchStats'])
        },
        computed: {
            ...mapGetters('stats', ['topics']),
            ...mapGetters('dashboard', [
                'widgets',
                'page'
            ])
        },
        components: {
            Widget
        },
        mounted () {
            this.fetchStats({ topics: this.topics });
        }
    }
</script>