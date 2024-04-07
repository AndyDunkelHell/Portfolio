import GitHubIcon from '@mui/icons-material/GitHub';
import LinkedInIcon from '@mui/icons-material/LinkedIn';
import { about } from '../../portfolio'
import Button from "../Button";
import { Popover } from "@headlessui/react";
import { useTheme } from "next-themes";
import React, { useEffect, useState } from "react";
import './About.css'

const About = ({ handleWorkScroll, handleAboutScroll, isBlog }) => {
  const { name, role, description, resume, social } = about
  const { theme, setTheme } = useTheme();
  const [mounted, setMounted] = useState(false);

  useEffect(() => {
    setMounted(true);
  }, []);

  return (
    <>
    <Popover className="block tablet:hidden mt-5">
      {({ open }) => (
        <>
          <div className="flex items-center justify-between p-2 laptop:p-0">
            <h1
              
              className="font-medium p-2 laptop:p-0 link"
            >
              {name}.
            </h1>

            <div className="flex items-center">
              
                <Button
                  onClick={() =>
                    setTheme(theme === "dark" )
                  }
                >
                  <img
                    className="h-6"
                    src={`/images/${
                      theme === "dark" ? "moon.svg" : "sun.svg"
                    }`}
                  ></img>
                </Button>

              <Popover.Button>
                <img
                  className="h-5"
                  src={`/images/${
                    !open
                      ? theme === "dark"
                        ? "menu-white.svg"
                        : "menu.svg"
                      : theme === "light"
                      ? "cancel.svg"
                      : "cancel-white.svg"
                  }`}
                ></img>
              </Popover.Button>
            </div>
          </div>
          <Popover.Panel
            className={`absolute right-0 z-10 w-11/12 p-4 ${
              theme === "dark" ? "bg-slate-800" : "bg-white"
            } shadow-md rounded-md`}
          >
            {!isBlog ? (
              <div className="grid grid-cols-1">
                <Button onClick={handleWorkScroll}>Work</Button>
                <Button onClick={handleAboutScroll}>About</Button>

                <Button
                  onClick={() => window.open("mailto:hello@chetanverma.com")}
                >
                  Contact
                </Button>
              </div>
            ) : (
              <div className="grid grid-cols-1">
                <Button
                  onClick={() => window.open("mailto:hello@chetanverma.com")}
                >
                  Contact
                </Button>
              </div>
            )}
          </Popover.Panel>
        </>
      )}
    </Popover>
    
    
    
    <div className='about center'>
      {name && (
        <h1>
          Hi, I am <span className='about__name'>{name}.</span>
        </h1>
      )}

      {role && <h2 className='about__role'>A {role}.</h2>}
      <p className='about__desc'>{description && description}</p>

      <div className='about__contact center'>
        {resume && (
          <a href={resume}>
            <span type='button' className='btn btn--outline'>
              Resume
            </span>
          </a>
        )}

        {social && (
          <>
            {social.github && (
              <a
                href={social.github}
                aria-label='github'
                className='link link--icon'
              >
                <GitHubIcon />
              </a>
            )}

            {social.linkedin && (
              <a
                href={social.linkedin}
                aria-label='linkedin'
                className='link link--icon'
              >
                <LinkedInIcon />
              </a>
            )}
          </>
        )}
      </div>
    </div>
    </>
  )
}

export default About
