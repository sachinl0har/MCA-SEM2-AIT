const express = require('express');
const session = require('express-session');
const cookieParser = require('cookie-parser');
const jwt = require('jsonwebtoken');

const app = express();
app.use(express.json());
app.use(cookieParser());

// Technique 1: Using Cookies
app.get('/set-cookie', (req, res) => {
  res.cookie('username', 'John', { maxAge: 900000, httpOnly: true });
  res.send('Cookie set successfully.');
});

app.get('/read-cookie', (req, res) => {
  const username = req.cookies.username;
  res.send('Username from cookie: ' + username);
});

// Technique 2: Using Express Session
app.use(session({
  secret: 'secret-key',
  resave: false,
  saveUninitialized: true
}));

app.get('/set-session', (req, res) => {
  req.session.username = 'Alice';
  res.send('Session set successfully.');
});

app.get('/read-session', (req, res) => {
  const username = req.session.username;
  res.send('Username from session: ' + username);
});

// Technique 3: Using JSON Web Tokens (JWT)
const secretKey = 'jwt-secret-key';

app.get('/generate-jwt', (req, res) => {
  const token = jwt.sign({ username: 'Bob' }, secretKey, { expiresIn: '1h' });
  res.send('JWT generated successfully: ' + token);
});

app.get('/read-jwt', (req, res) => {
  const token = req.query.token;
  jwt.verify(token, secretKey, (err, decoded) => {
    if (err) {
      res.send('Invalid JWT.');
    } else {
      const username = decoded.username;
      res.send('Username from JWT: ' + username);
    }
  });
});

const port = 3000;
app.listen(port, () => {
  console.log(`Server started on http://localhost:${port}`);
});
