<script>
    import route from 'page';
    import AboutPage from "./pages/AboutPage.svelte";
    import HomePage from "./pages/HomePage.svelte";
    import LoginPage from "./pages/LoginPage.svelte";
    import {isLogged} from "./store/user";
    import Profile from "./pages/user/Profile.svelte";

    const PUBLIC = 'anon';
    const AUTH_REQUIRED = 'user';
    export let current = HomePage

    function page(component, permission) {
        return () => {

            if (!$isLogged && permission !== PUBLIC) {
                location.href = '/login'
            }
            current = component


        }
    }


    route('/', page(HomePage, PUBLIC))
    route('/about', page(AboutPage, PUBLIC))
    route('/login', page(LoginPage, PUBLIC))
    route('/profile', page(Profile, AUTH_REQUIRED))
    route.start()

</script>