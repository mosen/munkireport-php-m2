export default {
    locale: 'en',
    locales: [
        'en', 'de', 'nl', 'fr', 'es', 'ru'
    ],
    navigation: {
        title: 'MunkiReport',
        admin: [
            {url: '/business_units/manage', name: 'nav.admin.business_units'}
        ],
        listings: [
            {url: '#', name: 'nav.listings.appusagereport'},
            {url: '/x/ard/listing', name: 'nav.listings.ard'},
            {url: '#', name: 'nav.listings.backup2go'},
            {url: '/x/bluetooth/listing', name: 'nav.listings.bluetooth'},
            {url: '#', name: 'nav.listings.caching'},
            {url: '/x/certificates', name: 'nav.listings.certificate'},
            {url: '/clients', name: 'nav.listings.clients'},
            {url: '#', name: 'nav.listings.deploystudio'},
            {url: '/x/directory_services', name: 'nav.listings.directoryservice'},
            {url: '/x/disks', name: 'nav.listings.disk'},
            {url: '/x/displays', name: 'nav.listings.displays'},
            {url: '/x/findmymac/listing', name: 'nav.listings.findmymac'},
            {url: '/x/gsx/listing', name: 'nav.listings.gsx'},
            {url: '/machine/listing', name: 'nav.listings.hardware'},
            {url: '#', name: 'nav.listings.inventory'},
            {url: '#', name: 'nav.listings.location'},
            {url: '/x/munki_reports', name: 'nav.listings.munki'},
            {url: '/x/networks', name: 'nav.listings.network'},
            {url: '/x/power/listing', name: 'nav.listings.power'},
            {url: '/x/printers', name: 'nav.listings.printers'},
            {url: '#', name: 'nav.listings.profile'},
            {url: '#', name: 'nav.listings.sccm_status'},
            {url: '/x/security/listing', name: 'nav.listings.security'},
            {url: '/x/timemachine/listing', name: 'nav.listings.timemachine'},
            {url: '/x/warranty/listing', name: 'nav.listings.warranty'},
            {url: '/x/wifi/listing', name: 'nav.listings.wifi'}
        ],
        reports: [
            {url: '/reports/backup', name: 'nav.reports.backup'},
            {url: '/reports/clients', name: 'nav.reports.clients'},
            {url: '/reports/configuration', name: 'nav.reports.configuration'},
            {url: '/x/findmymac/report', name: 'nav.reports.findmymac'},
            {url: '/reports/hardware', name: 'nav.reports.hardware'},
            {url: '/x/location/report', name: 'nav.reports.location'},
            {url: '/x/munkireport/report', name: 'nav.reports.munki'},
            {url: '/x/network/report', name: 'nav.reports.network'},
            {url: '/x/power/report', name: 'nav.reports.power'},
            {url: '/x/backup2go/report', name: 'nav.reports.backup2go'},
        ],
        themes: [
            'standard'
        ]
    }
}