import React, { useState } from 'react';
import api from './testAPI/axios';

const Login = () => {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleLogin = async (e) => {
    e.preventDefault();
    try {
      // Fetch CSRF cookie first
      await api.get('/sanctum/csrf-cookie');
      
      const response = await api.post('/login', { email, password });
      localStorage.setItem('token', response.data.token);
      alert('Logged in!');
    } catch (error) {
      console.log(error.message);
      
    }
  };

  return (
    <form onSubmit={handleLogin}>
      <input type="email" value={email} onChange={(e) => setEmail(e.target.value)} />
      <input type="password" value={password} onChange={(e) => setPassword(e.target.value)} />
      <button type="submit">Login</button>
    </form>
  );
};

export default Login;