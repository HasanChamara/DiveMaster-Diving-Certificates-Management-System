import { Anchor, LogIn, Menu, X } from 'lucide-react';
import React, { useEffect, useState } from 'react';
import { Link } from './Link';

interface NavbarProps {
    transparent?: boolean;
}

const Navbar: React.FC<NavbarProps> = ({ transparent = false }) => {
    const [isOpen, setIsOpen] = useState(false);
    const [scrolled, setScrolled] = useState(false);

    useEffect(() => {
        const handleScroll = () => {
            const offset = window.scrollY;
            if (offset > 50) {
                setScrolled(true);
            } else {
                setScrolled(false);
            }
        };

        window.addEventListener('scroll', handleScroll);
        return () => {
            window.removeEventListener('scroll', handleScroll);
        };
    }, []);

    const navClasses = transparent
        ? `fixed w-full z-30 transition-all duration-300 ${scrolled || isOpen ? 'bg-slate-900/95 shadow-lg' : 'bg-transparent'}`
        : 'bg-slate-900 shadow-lg w-full z-30';

    return (
        <nav className={navClasses}>
            <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div className="flex h-16 items-center justify-between">
                    <div className="flex items-center">
                        <div className="flex-shrink-0">
                            <Link href="/" className="flex items-center">
                                <Anchor className="h-8 w-8 text-teal-500" />
                                <span className="ml-2 text-xl font-bold text-white">DiveMaster</span>
                            </Link>
                        </div>
                        <div className="hidden md:block">
                            <div className="ml-10 flex items-baseline space-x-4">
                                <a href="/" className="rounded-md px-3 py-2 font-medium text-white hover:text-teal-300">
                                    Home
                                </a>
                                <a href="/about" className="rounded-md px-3 py-2 font-medium text-gray-300 hover:text-teal-300">
                                    About
                                </a>
                                <a href="/contact" className="rounded-md px-3 py-2 font-medium text-gray-300 hover:text-teal-300">
                                    Contact
                                </a>
                            </div>
                        </div>
                    </div>
                    <div className="hidden md:block">
                        <div className="ml-4 flex items-center md:ml-6">
                            <a
                                className="flex w-full items-center justify-center rounded-lg bg-teal-600 px-4 py-2 font-medium text-white transition duration-150 ease-in-out hover:bg-teal-700"
                                href="/login"
                            >
                                Login
                            </a>
                        </div>
                    </div>
                    <div className="-mr-2 flex md:hidden">
                        <a
                            className="flex w-full items-center justify-center rounded-lg bg-teal-600 px-4 py-2 font-medium text-white transition duration-150 ease-in-out hover:bg-teal-700"
                            href="/login"
                        >
                            Login
                        </a>
                    </div>
                </div>
            </div>

            {isOpen && (
                <div className="bg-slate-900 shadow-lg md:hidden">
                    <div className="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                        <a href="/" className="rounded-md px-3 py-2 font-medium text-white hover:text-teal-300">
                            Home
                        </a>
                        <a href="/about" className="rounded-md px-3 py-2 font-medium text-gray-300 hover:text-teal-300">
                            About
                        </a>
                        <a href="/contact" className="rounded-md px-3 py-2 font-medium text-gray-300 hover:text-teal-300">
                            Contact
                        </a>
                    </div>
                    <div className="border-t border-slate-700 pt-4 pb-3">
                        <div className="flex items-center px-5">
                            <a
                                className="flex w-full items-center justify-center rounded-lg bg-teal-600 px-4 py-2 font-medium text-white transition duration-150 ease-in-out hover:bg-teal-700"
                                href="/login"
                            >
                                <LogIn className="mr-2 h-4 w-4" />
                                Login
                            </a>
                        </div>
                    </div>
                </div>
            )}
        </nav>
    );
};

export default Navbar;
