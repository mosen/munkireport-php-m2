// Temporarily, this will hold a list of widgets and their placement.
// This should in future be stored in the db

// Widgets are an array of pages
// the next list of arrays are rows.
// each item in a row is a column

// each widget definition is the name of a registered component, then a height (in arbitrary layout units of 1-3) then width
export const widgets = [
  [
    {
      widget: 'core-widget-client-activity',
      height: 1, width: 4
    },
    {
      widget: 'core-widget-events',
      height: 1, width: 8
    }
  ],
    [
      {
        widget: 'core-widget-newclients',
        height: 1, width: 4
      },
      {
        widget: 'installs-widget-pending-apple',
        height: 1, width: 4
      },
      {
        widget: 'installs-widget-pending-munki',
        height: 1, width: 4
      }
    ]
  , [
    {
      widget: 'munkireport-widget',
      height: 1, width: 4
    },
    {
      widget: 'disk-widget-diskreport',
      height: 1, width: 4
    },
    {
      widget: 'core-widget-uptime',
      height: 1, width: 4
    }
  ],
  [
    {
      widget: 'disk-widget-fvstatus',
      height: 1, width: 1
    },
    {
      widget: 'disk-widget-smartstatus',
      height: 1, width: 1
    },
    {
      widget: 'ds-widget-bound',
      height: 1, width: 1
    },
    {
      widget: 'core-widget-installedmemory',
      height: 1, width: 1
    },

    {
      widget: 'disk-widget-diskreport',
      height: 1, width: 1
    }
  ],
  [
    {
      widget: 'ds-widget-modifiedcomputernames',
      height: 1, width: 1
    },
    {
      widget: 'b2g-widget',
      height: 1, width: 1
    },
    {
      widget: 'bluetooth-widget-battery',
      height: 1, width: 1
    }
  ],
  [
    {
      widget: 'certificate-widget',
      height: 1, width: 1
    },
    {
      widget: 'crashplan-widget',
      height: 1, width: 1
    },
    {
      widget: 'display-widget-external',
      height: 1, width: 1
    }
  ],
  [
    {
      widget: 'findmymac-widget',
      height: 1, width: 1
    },

    {
      widget: 'installs-widget-pending-munki',
      height: 1, width: 1
    },
  ],
  [
    {
      widget: 'core-widget-duplicatednames',
      height: 1, width: 1
    },
    {
      widget: 'core-widget-hardwaremodel',
      height: 1, width: 1
    },
    {
      widget: 'core-widget-hardwaretype',
      height: 1, width: 1
    },
    {
      widget: 'timemachine-widget',
      height: 1, width: 1
    },
    {
      widget: 'wifi-widget-networks',
      height: 1, width: 1
    }
  ]
];