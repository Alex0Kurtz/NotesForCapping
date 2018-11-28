const path = require('path');
const fetch = require('node-fetch');
TESTING BRANCHING
const {GET_ALL_USERS} = require('../config/util')
const bodyPaser = require('body-parser');
const bcrypt = require('bcryptjs');
var salt = bcrypt.genSaltSync(10);
module.exports = (app) => {
    app.get('/admin', (req, res) => {
        fetch(GET_ALL_USERS,{
            method: 'GET',
        })
        .then(res => res.json())
        .then(resp => {
           res.render('adminPage', {users: resp, userInfo: req.session.user})
        }).catch(err => res.send(err));
    });
    app.get('/logout', (req, res) => {
        delete req.session.user;
        res.redirect('/')
    });
    app.post('/createUser', (req, res) => {
        console.log('all bodyyyyy', req.body)
        fetch(GET_ALL_USERS, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                userEmail: req.body.userEmail,
                userPassword: bcrypt.hashSync(req.body.userPassword, salt), 
                userFirstName: req.body.userFirstName,
                userLastName: req.body.userLastName,
                userCreditReq: req.body.userCreditReq,
                userYearStarted: parseInt(req.body.userYearStarted)
            })
        }).then(res => res.json())
            .then(data =>  {
                console.log('success resp from api', JSON.stringify(data));
            }).catch(err => console.log('errr occured', err))
    });
    return app;
}

