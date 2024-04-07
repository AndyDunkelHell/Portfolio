import { header } from '../../portfolio'
import Navbar from '../Navbar/Navbar'
import './Header.css'
import React, { useEffect, useState } from "react";

const Header = () => {
  const { homepage, title } = header
  const [mounted, setMounted] = useState(false);

  useEffect(() => {
    setMounted(true);
  }, []);


  return (
    <header className='header sticky_top center'>
      <h3>
        {homepage ? (
          <a href={homepage} className='link'>
            {title}
          </a>
        ) : (
          title
        )}
      </h3>
      <Navbar />
    </header>
  )
}

export default Header
