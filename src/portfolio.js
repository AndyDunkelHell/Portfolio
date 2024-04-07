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
    "I am Andres Gonzalez, 24 years old. I'm currently studying a Master's degree in Medical Informatics at the University of Leipzig. I come from Venezuela and am in Germany so that I can make my dream come true, namely to help millions of people in the future with my developments. In the first year of my life in Germany I was in Cologne as an exchange student, then I studied for a year in a Studienkolleg in Geilenkirchen. During the following years I completed my Bachelor's degree in Biomedical Engineering at the FH Aachen. My passion lies in creating things and if you want to see it for yourself, I invite you to look further into my projects bellow!",
  resume: 'https://github.com/AndyDunkelHell/Portfolio/blob/main/CurriculumAndresGonzalez2023_ENG.pdf',
  social: {
    linkedin: ' https://www.linkedin.com/in/andres-gonzalez-rivera-13b168139/',
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
    livePreview: 'https://www.linkedin.com/posts/andres-gonzalez-rivera-13b168139_biomedicalengineering-bionichand-vr-activity-7179784230443307008-Ujj8?utm_source=share&utm_medium=member_desktop',
    
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
  'TensorFlow'
]

const contact = {
  // email is optional - if left empty Contact section won't show up
  email: 'andres.gonzalez.rivera@gmail.com',
}

export { header, about, projects, skills, contact }
