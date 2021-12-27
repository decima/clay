<script>
    import {isLogged} from "./store/user";
</script>

<header>
    <nav class="border-gray-200 px-2 sm:px-4 rounded dark:bg-gray-800">

        <a href="/">home</a>
        <a href="/about">about</a>
        <a href="/logout">logout</a>

    </nav>
</header>

<style  lang="postcss">
    header{
        @apply w-full shadow fixed bg-white;
    }

    a{
        @apply h-full inline-block h-full py-3 px-6 text-black w-60 text-center;
        @apply hover:text-gray-100 hover:bg-yellow-800;
    }
</style>