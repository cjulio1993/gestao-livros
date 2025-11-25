import React from 'react';
import { createRoot } from 'react-dom/client';
import ProjetoIntegradorDashboard from './components/ProjetoIntegradorDashboard';

function bootstrap() {
  const el = document.getElementById('app');
  if (!el) return;

  const root = createRoot(el);
  root.render(<ProjetoIntegradorDashboard />);
}

bootstrap();
