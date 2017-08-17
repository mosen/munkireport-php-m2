<script>
  import './Widget.scss';
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

  // Polymorphic widget component should just render a globally registered widget based on the name passed down on
  // a prop
  export default {
    props: ['widget', 'height', 'width'],
    render: function (createElement) {
      return createElement(
        this.widget,
        {
          props: {
            height: this.height,
            width: this.width
          },
          slot: this.$slots.default
        }
      )
    }
  }
</script>