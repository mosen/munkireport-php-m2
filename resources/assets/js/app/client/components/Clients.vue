<template>
    <div class="container">
        <clients-table />
    </div>
</template>


<script>
    import ClientsTable from './ClientsTable';

    export default {
        components: {
          'clients-table': ClientsTable
        }
    }
</script>