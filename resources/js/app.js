/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//require('./components/Index');
//import ReactDOM from 'react-dom';
//import Index from './components/Index';
//import {BrowserRouter as Router, Routes, Route } from 'react-router-dom';

//import GithubUserComponent from './containers/GithubUser/index';
//require('./components/Index');

//import React from 'react';
//import {BrowserRouter as Router, Routes, Route } from 'react-router-dom';
//import routes from '../routes/index';
//import Header from '../js/components/Header/index';
//import SubHeader from '../js/components/Header/subHeader';
//import 'semantic-ui-css/semantic.min.css';

/*export default function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Layout />}>
          
        </Route>
      </Routes>
    </BrowserRouter>
  );
}
}*/


/*if (document.getElementById('app')) { 
    ReactDOM.render(
        <Router>
            <Routes>
                <Route exact path="/" render = {(props) => <Index {...props}/>}/>
                
                
             </Routes>
        </Router>
    , document.getElementById('app'));
}*/

/*function App(){
    return (
        <div className='App'>
            <h1>Here will be the app components</h1>
        </div>
    );
}*/
/*const root = ReactDOM.createRoot(
    document.getElementById("app")
  ); console.log(root);
  root.render(<Index/>);*/

import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter as Router, Routes, Route } from 'react-router-dom';

import Home from './containers/Home';
import GithubUserComponent from './containers/GithubUser/index';
function MyApp() { 
    return (
        <div className="container">
            
            <Router>
                <Routes>
                    <Route  path='/'  exact element = {<Home/>}/>
                        
                    <Route  path='githubUser'  exact element = {<GithubUserComponent/>}/>
                    
                </Routes>
            </Router>
        </div>
    );
}
export default MyApp;
if (document.getElementById('app')) { 
    ReactDOM.render(<MyApp />, document.getElementById('app'));
}