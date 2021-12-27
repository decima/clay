<script>
    export let current = null
</script>
<div class="h-screen flex">
    <div class="flex w-1/2 bg-gradient-to-tr from-yellow-900 to-red-300 i justify-around items-center">
        <div>
            <h1 class="text-white font-bold text-4xl font-sans">Clay</h1>
            <p class="text-white mt-1">Assets management</p>
        </div>
    </div>
    <div class="flex w-1/2 justify-center items-center bg-white">
        <svelte:component this={current}/>
    </div>
</div>

<style lang="postcss">


</style>