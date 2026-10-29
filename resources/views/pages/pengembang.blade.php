<x-layouts>
    <main class="main py-12 bg-gray-50 min-h-screen">
      <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-8 md:flex md:items-center">
          
          <!-- Foto Penulis -->
          <div class="md:w-1/3 mb-6 md:mb-0 md:mr-8 flex justify-center">
            <img 
              src="{{ asset('images/penulis.jpg') }}" 
              alt="Foto Penulis" 
              class="w-40 h-40 rounded-full object-cover border-4 border-indigo-500 shadow-md"
            >
          </div>
  
          <!-- Detail Penulis -->
          <div class="md:w-2/3">
            <h1 class="text-3xl font-bold text-gray-800 mb-1">Yufa Mujidin</h1>
            <p class="text-indigo-600 text-sm mb-4">Penulis | Web Developer | Pembelajar Seumur Hidup</p>
            <p class="text-gray-700 leading-relaxed mb-4">
              Yufa Mujidin adalah penulis dan pengembang web yang aktif di dunia teknologi digital. Dengan semangat berbagi ilmu, ia rutin menulis artikel, tutorial, dan proyek open-source. Fokus utamanya adalah Laravel, sistem informasi, dan UI modern.
            </p>
            <p class="text-gray-700 leading-relaxed mb-4">
              Di luar aktivitas coding, Yufa juga gemar menulis blog pribadi seputar kehidupan, teknologi, dan motivasi belajar. Prinsip hidupnya sederhana: "Terus belajar, terus tumbuh."
            </p>
  
            <!-- Sosial Media -->
            <div class="flex space-x-4 mt-4">
              <a href="https://facebook.com/username" target="_blank" class="text-blue-600 hover:underline">Facebook</a>
              <a href="https://twitter.com/username" target="_blank" class="text-sky-500 hover:underline">Twitter</a>
              <a href="https://linkedin.com/in/username" target="_blank" class="text-indigo-700 hover:underline">LinkedIn</a>
            </div>
          </div>
  
        </div>
      </div>
    </main>
  </x-layouts>

  