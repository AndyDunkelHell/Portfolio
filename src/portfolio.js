const header = {
  // all the properties are optional - can be left empty or deleted
  homepage: 'https://andydunkelhell.github.io/Portfolio/',
  title: 'AG.',
}

const about = {
  // all the properties are optional - can be left empty or deleted
  name: 'Andres Gonzalez',
  role: 'Biomedical Engineer',
  role2:
    'Medical computer scientist -',
  role3:
    'Professional tinkerer',
  description:
    " I'm currently studying a master’s degree in medical computer science at Leipzig University. I came to Germany as an exchange student, then I decided to pursue my higher education in the fields of biomedical engineering and medical computer science. During my studies I have also been a part of many research and development interdisciplinary teams focused on projects in my fields of study. There I gathered many skills, such as designing and manufacturing testing-rigs, prostheses, custom PCBs and soft robots, as well as creating the software to easily and intuitively control such hardware. My passion lies in creating things that help people and thanks to my studies and work experience I can perform all the tasks involved in the development of a prototype, from conception and design, through electronics and hardware, until software development. If you want to see it for yourself, I invite you to look further into my projects bellow!",
  resume: 'https://github.com/AndyDunkelHell/Portfolio/blob/main/Curriculum_Andres_Gonzalez_2025_ENG.pdf',
  social: {
    linkedin: ' https://www.linkedin.com/in/andresegonzalezr/',
    github: 'https://github.com/AndyDunkelHell',
  },
}

const projects = [
  // projects can be added an removed
  // if there are no projects, Projects section won't show up
  {
    name: 'Project BBH',
    pic: 'Picture2.png',
    description:
      'Brandt Bionic Hand (BBH) project 3D-Printed Bionic Hand with Visual and Myoelectrical Control Mechanisms and Enhanced Dexterity ',
    stack: ['C++', 'C', 'Python'],
    sourceCode: 'https://github.com/AndyDunkelHell/ProjectBBH',
    livePreview: 'https://www.linkedin.com/posts/andresegonzalezr_biomedicalengineering-bionichand-vr-activity-7179784230443307008-RThh?utm_source=share&utm_medium=member_desktop&rcm=ACoAACGpOL8BST7PsuEH3YjfDbvvmsdMaxNaMxk',
    
  },
  {
    name: 'Vertebrae Local Coordinates',
    pic: 'Picture3.png',
    description:
      'Python Code to Generate a Local Coordinate System on an STL file from a Vertebrae using the VTK Library ',
    stack: ['Python'],
    sourceCode: 'https://github.com/AndyDunkelHell/vertebraeLocalCoordinates',
    livePreview: 'https://github.com/AndyDunkelHell/vertebraeLocalCoordinates',
  },
  {
    name: 'Stepper Controller',
    pic: 'Picture4.png',
    description:
      'Stepper Controller with Python GUI and Arduino ',
    stack: ['C++', 'Python'],
    sourceCode: 'https://github.com/AndyDunkelHell/StepperController-Python',
    livePreview: 'https://github.com/AndyDunkelHell/StepperController-Python',
  },

  {
    name: 'Tekton Home',
    pic: 'Picture5.png',
    description:
      'WebApp to control multiple WiFi capable Microcontrollers and Portable computers ',
    stack: ['Python', 'JavaScript', 'C++', 'CSS'],
    sourceCode: 'https://github.com/AndyDunkelHell/tektonHome',
    livePreview: 'https://github.com/AndyDunkelHell/tektonHome',
  
  },
    {
    name: 'FlexDMS3D',
    pic: 'FlexDMS3D.png',
    description:
      'Flexible Strain Gauge Sensors Using 3D Printed Filaments for Soft Robotic Applications',
    stack: ['Python', 'Custom PCBs', 'C++', 'CSS'],
    sourceCode: 'https://github.com/AndyDunkelHell/FlexDMS3D',
    livePreview: 'https://github.com/AndyDunkelHell/FlexDMS3D',
  
  },
{
  name: 'Other Projects',
  pic: 'DunkelHell2.png',
  description:
    'Here you will find some of my other projects that do not necessarily have to do with Programming',
  stack: ['Adobe Suite', 'Photography', 'Video Editing', 'CAD'],
  sourceCode: 'https://github.com/AndyDunkelHell/Portfolio/tree/main/OtherProjects',
  livePreview: 'https://github.com/AndyDunkelHell/Portfolio/tree/main/OtherProjects',

},
]

const skills = [
  // skills can be added or removed
  // if there are no skills, Skills section won't show up
  'Spanish',
  'English',
  'German',
  'Git',
  'Adobe Suite',
  'Python',
  'CAD (Autodesk Inventor)',
  'C#/C++',
  'HTML',
  'MySQL',
  'CSS',
  'Java/JavaScript',
  'React',
  '3D Printing',
  'Unity Engine',
  'TensorFlow',
  'Arduino',
  'Microcontrollers',
  'TFLite',
  'PCB Design',
  'Soft Robotics',
  'ECAD',
  'Microsoft Suite',
  'Soldering'

]

const contact = {
  // email is optional - if left empty Contact section won't show up
  email: 'andres.gonzalez.rivera@gmail.com',
}

export { header, about, projects, skills, contact }
