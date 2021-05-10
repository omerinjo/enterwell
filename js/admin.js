import React, { Component } from 'react'
import ReactDOM from 'react-dom';
import Index from './src/index'

const Admin = () => {
    return (
        <Index />
    )
}

ReactDOM.render(
    <Admin />,
    document.querySelector('#admin-root')
)