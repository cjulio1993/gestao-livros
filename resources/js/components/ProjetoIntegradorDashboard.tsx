import React, { useState } from 'react';
import { BookOpen, Users, CheckCircle, FileText, Code, Target, Lightbulb, AlertCircle, Download, Database, Layers } from 'lucide-react';

export default function ProjetoIntegradorCompleto() {
  const [activeSection, setActiveSection] = useState('titulo');

  const checklistItems = [
    { id: 'titulo', label: 'Título do Artigo', icon: <FileText className="w-5 h-5" />, completed: true },
    { id: 'autores', label: 'Identificação dos Autores', icon: <Users className="w-5 h-5" />, completed: true },
    { id: 'resumo', label: 'Resumo', icon: <BookOpen className="w-5 h-5" />, completed: true },
    { id: 'palavras', label: 'Palavras-chave', icon: <Target className="w-5 h-5" />, completed: true },
    { id: 'introducao', label: 'Introdução', icon: <Lightbulb className="w-5 h-5" />, completed: true },
    { id: 'objetivos', label: 'Objetivos', icon: <Target className="w-5 h-5" />, completed: true },
    { id: 'desenvolvimento', label: 'Desenvolvimento', icon: <Code className="w-5 h-5" />, completed: true },
    { id: 'consideracoes', label: 'Considerações Finais', icon: <CheckCircle className="w-5 h-5" />, completed: true },
    { id: 'referencias', label: 'Referências ABNT', icon: <FileText className="w-5 h-5" />, completed: true },
  ];

  const sections: Record<string, { title: string; content: React.ReactNode }> = {
    titulo: {
      title: '1. TÍTULO DO ARTIGO',
      content: (
        <div className="space-y-6">
          <div className="bg-gradient-to-r from-blue-600 to-purple-600 text-white p-8 rounded-lg shadow-lg">
            <h2 className="text-3xl font-bold mb-4 text-center">
              SISTEMA WEB DE GERENCIAMENTO DE BIBLIOTECA ESCOLAR: 
              DESENVOLVIMENTO DE PLATAFORMA PARA CONTROLE DE ACERVO E EMPRÉSTIMOS
            </h2>
            <p className="text-center text-blue-100 text-sm mt-4">
              Desenvolvido em Laravel 10 e PHP 8.2
            </p>
          </div>
        </div>
      )
    },
    autores: {
      title: '2. IDENTIFICAÇÃO DOS AUTORES',
      content: (
        <div className="space-y-6">
          <div className="bg-white border-2 border-gray-200 rounded-lg p-6">
            <h3 className="text-xl font-bold mb-6 text-center text-gray-800">Autores do Projeto</h3>
            <p className="text-sm text-gray-600 text-center">(Edite os autores no componente conforme necessário)</p>
          </div>
        </div>
      )
    },
    resumo: {
      title: '3. RESUMO',
      content: (
        <div className="space-y-6">
          <div className="bg-white border-2 border-gray-200 rounded-lg p-8">
            <h3 className="text-xl font-bold mb-4 text-center text-gray-800">RESUMO</h3>
            <p className="text-justify text-gray-700 leading-relaxed">Este componente apresenta um checklist e orientação do Projeto Integrador para o sistema de biblioteca escolar.</p>
          </div>
        </div>
      )
    },
    palavras: {
      title: '4. PALAVRAS-CHAVE',
      content: (
        <div className="space-y-6">
          <div className="bg-white border-2 border-gray-200 rounded-lg p-8">
            <h3 className="text-xl font-bold mb-6 text-center text-gray-800">PALAVRAS-CHAVE</h3>
          </div>
        </div>
      )
    },
    introducao: {
      title: '5. INTRODUÇÃO',
      content: (
        <div className="space-y-6">
          <div className="bg-white border-2 border-gray-200 rounded-lg p-8">
            <h3 className="text-xl font-bold mb-6 text-center text-gray-800">INTRODUÇÃO</h3>
            <p className="text-justify text-gray-700 leading-relaxed">Introdução do projeto...</p>
          </div>
        </div>
      )
    },
    objetivos: {
      title: '6. OBJETIVOS',
      content: (
        <div className="space-y-6">
          <div className="bg-white border-2 border-gray-200 rounded-lg p-8">
            <h3 className="text-xl font-bold mb-6 text-center text-gray-800">OBJETIVOS</h3>
          </div>
        </div>
      )
    },
    desenvolvimento: {
      title: '7. DESENVOLVIMENTO',
      content: (
        <div className="space-y-6">
          <div className="bg-white border-2 border-gray-200 rounded-lg p-8">
            <h3 className="text-xl font-bold mb-6 text-center text-gray-800">DESENVOLVIMENTO</h3>
          </div>
        </div>
      )
    },
    consideracoes: {
      title: '8. CONSIDERAÇÕES FINAIS',
      content: (
        <div className="space-y-6">
          <div className="bg-white border-2 border-gray-200 rounded-lg p-8">
            <h3 className="text-xl font-bold mb-6 text-center text-gray-800">CONSIDERAÇÕES FINAIS</h3>
          </div>
        </div>
      )
    },
    referencias: {
      title: '9. REFERÊNCIAS',
      content: (
        <div className="space-y-6">
          <div className="bg-white border-2 border-gray-200 rounded-lg p-8">
            <h3 className="text-xl font-bold mb-6 text-center text-gray-800">REFERÊNCIAS</h3>
          </div>
        </div>
      )
    }
  };

  return (
    <div className="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">
      <header className="bg-white shadow-lg border-b-4 border-blue-600">
        <div className="max-w-7xl mx-auto px-6 py-6">
          <div className="flex items-center justify-between">
            <div className="flex items-center gap-4">
              <div className="w-14 h-14 bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg flex items-center justify-center shadow-lg">
                <BookOpen className="w-8 h-8 text-white" />
              </div>
              <div>
                <h1 className="text-2xl font-bold text-gray-900">Projeto Integrador - Programação WEB</h1>
                <p className="text-sm text-gray-600">Sistema de Gerenciamento de Biblioteca Escolar</p>
              </div>
            </div>
            <div className="text-right">
              <p className="text-sm font-semibold text-gray-700">UNISA 2024</p>
              <p className="text-xs text-gray-500">Laravel 10 + PHP 8.2</p>
            </div>
          </div>
        </div>
      </header>

      <main className="max-w-7xl mx-auto px-6 pb-12">
        <div className="bg-white rounded-lg shadow-lg p-8 mt-6">
          <div className="mb-6">
            <h2 className="text-2xl font-bold text-gray-900 mb-2">{sections[activeSection].title}</h2>
            <div className="h-1 w-24 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full"></div>
          </div>
          {sections[activeSection].content}
        </div>
      </main>

      <footer className="bg-gray-900 text-white py-8 mt-12">
        <div className="max-w-7xl mx-auto px-6 text-sm text-gray-400 text-center">Projeto Integrador - Biblioteca Escolar</div>
      </footer>
    </div>
  );
}
