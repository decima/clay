import {writable} from 'svelte/store';

export const isLogged = writable(false);
export const user = writable({
    'name': 'Henri'
});


const currentToken = localStorage.getItem("token");
if (currentToken) {
    isLogged.set(true)
}
export const authToken = writable(currentToken);
authToken.subscribe(value => {
    localStorage.setItem("token", value);
    isLogged.set(true)
});
