<script>
    import {authToken, user} from "../store/user";

    let email;
    let password;
    let errorMessage = null;

    async function handleSubmit() {
        const emailInput = email
        const passwordInput = password
        password = ""
        errorMessage = ""
        const response = (await fetch('/api/login_check', {
            method: 'POST',
            mode: 'cors',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({username: emailInput, password: passwordInput})
        }))
        const jsonResponse = (await response.json());
        console.log(jsonResponse);
        if (response.status !== 200) {
            errorMessage = jsonResponse.message
        }else{
            $authToken = jsonResponse.token
        }
        console.log(response.status)
    }

</script>
<div>
    {#if (errorMessage)}
        <div class="alert">
            {errorMessage}
        </div>
    {/if}
    <form method="post" on:submit|preventDefault={handleSubmit}>
        <input type="email" name="email" placeholder="email" required bind:value={email}/>
        <input type="password" name="password" placeholder="password" required bind:value={password}/>
        <button type="submit">Login</button>
    </form>

</div>


<style lang="postcss">
</style>