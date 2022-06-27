import React from 'react';
import {BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import routes from '../../routes/index';
import Header from './Header/index';
import SubHeader from './Header/subHeader';
import 'semantic-ui-css/semantic.min.css';

function Index() { 
    return (
        <div>
             <Header/>
            <SubHeader/>
        </div>
        
    );
}

export default Index;




