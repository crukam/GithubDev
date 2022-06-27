import GithubUserComponent from '../js/containers/GithubUser/index';
import LoginComponent from '../js/containers/Login/index';
import SignUpComponent from '../js/containers/signUp/index';
const routes = [
    {
        path:'/user/login',
        component: LoginComponent,
        title: 'Login'
    },
    {
        path:'/user/register',
        component: SignUpComponent,
        title: 'Registrer'
    },
    {
        path:'/githubUser/view',
        component: GithubUserComponent,
        title: 'Github user view'

    }
];

export default routes;