// src/App.jsx
import React, { useEffect, useState } from 'react';
import axios from 'axios';

function App() {
  const [libros, setLibros] = useState([]);
  const [titulo, setTitulo] = useState('');
  const [autor, setAutor] = useState('');
  const [genero, setGenero] = useState('');
  const [disponible, setDisponible] = useState(true);

  const API = 'http://localhost:8000/api/libros';

  const cargarLibros = async () => {
    try {
      const res = await axios.get(API);
      setLibros(res.data);
    } catch (error) {
      console.error('Error al obtener libros', error);
    }
  };

  useEffect(() => {
    cargarLibros();
  }, []);

  const crearLibro = async () => {
    try {
      await axios.post(API, {
        titulo,
        autor,
        genero,
        disponible,
      });
      setTitulo('');
      setAutor('');
      setGenero('');
      setDisponible(true);
      cargarLibros();
    } catch (error) {
      console.error('Error al crear libro', error);
    }
  };

  const eliminarLibro = async (id) => {
    try {
      await axios.delete(`${API}/${id}`);
      cargarLibros();
    } catch (error) {
      console.error('Error al eliminar libro', error);
    }
  };

  return (
    <div style={{ padding: '20px' }}>
      <h1>📚 Sistema Biblioteca - CRUD Libros</h1>

      <div>
        <input
          type="text"
          placeholder="Título"
          value={titulo}
          onChange={(e) => setTitulo(e.target.value)}
        />
        <input
          type="text"
          placeholder="Autor"
          value={autor}
          onChange={(e) => setAutor(e.target.value)}
        />
        <input
          type="text"
          placeholder="Género"
          value={genero}
          onChange={(e) => setGenero(e.target.value)}
        />
        <label>
          Disponible
          <input
            type="checkbox"
            checked={disponible}
            onChange={(e) => setDisponible(e.target.checked)}
          />
        </label>
        <button onClick={crearLibro}>Guardar</button>
      </div>

      <h2>📖 Lista de Libros</h2>
      <ul>
        {libros.map((libro) => (
          <li key={libro.id}>
            {libro.titulo} - {libro.autor} ({libro.genero}) [{libro.disponible ? '✅ Disponible' : '❌ Prestado'}]
            <button onClick={() => eliminarLibro(libro.id)}>Eliminar</button>
          </li>
        ))}
      </ul>
    </div>
  );
}

export default App;
