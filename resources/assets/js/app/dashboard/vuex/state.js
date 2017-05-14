export default {
  page: 0,
  pages: [{
    title: 'main',
    widgets: [
      [
        'core-widget-client',
        'core-widget-duplicatednames',
        'core-widget-uptime'
      ]
      ,[
        'core-widget-events',
        'core-widget-hardwaremodel',
        'core-widget-hardwaretype'
      ],
      [
        'core-widget-installedmemory',
        'core-widget-newclients',
        'disk-widget-diskreport'
      ],
      [
        'disk-widget-fvstatus',
        'disk-widget-smartstatus',
        'ds-widget-bound'
      ],
      [
        'ds-widget-modifiedcomputernames',
        'b2g-widget',
        'bluetooth-widget-battery'
      ],
      [
        'certificate-widget',
        'crashplan-widget',
        'display-widget-external'
      ],
      [
        'findmymac-widget',
        'installs-widget-pending-apple',
        'installs-widget-pending-munki'
      ],
      [
        'munkireport-widget',
        'timemachine-widget',
        'wifi-widget-networks'
      ]
    ]
  }]
}
