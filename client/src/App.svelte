<script>
    import Router from "./Router.svelte";
    import {isLogged} from "./store/user";
    import Navbar from "./Navbar.svelte";
    import Cover from "./layout/Cover.svelte";

    let current = null;


</script>
<Router bind:current/>
{#if $isLogged}
    <Navbar/>
    <div class="container mx-auto pt-20 px-4">
        <svelte:component this={current}/>
    </div>
{:else}
    <Cover bind:current/>


{/if}

<style global lang="postcss">
    @tailwind base;
    @tailwind components;
    @tailwind utilities;

    button{
        @apply bg-gradient-to-tr from-yellow-700 to-red-300 text-white hover:from-yellow-600 hover:to-red-300;
    }
    input, button {
        @apply border border-4 rounded px-4 py-2;
    }

    .alert {
        @apply relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg my-4 block
    }
</style>