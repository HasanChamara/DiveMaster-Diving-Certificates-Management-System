import { Facebook, Instagram, Mail, PhoneCall, Twitter } from 'lucide-react';
import React from 'react';
import { Link } from './Link';

const Footer: React.FC = () => {
    return (
        <footer className="bg-slate-900 text-white">
            <div className="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                <div className="grid grid-cols-1 gap-8 md:grid-cols-4">
                    <div className="col-span-1 md:col-span-1">
                        <h3 className="mb-4 text-lg font-semibold">DiveMaster</h3>
                        <p className="mb-4 text-sm text-gray-300">
                            Professional diving certification management system for dive instructors and centers worldwide.
                        </p>
                        <div className="flex space-x-4">
                            <a href="#" className="text-gray-400 transition-colors duration-300 hover:text-teal-400">
                                <Instagram className="h-5 w-5" />
                            </a>
                            <a href="#" className="text-gray-400 transition-colors duration-300 hover:text-teal-400">
                                <Facebook className="h-5 w-5" />
                            </a>
                            <a href="#" className="text-gray-400 transition-colors duration-300 hover:text-teal-400">
                                <Twitter className="h-5 w-5" />
                            </a>
                        </div>
                    </div>

                    <div>
                        <h3 className="mb-4 text-lg font-semibold">Quick Links</h3>
                        <ul className="space-y-2">
                            <li>
                                <Link href="/" className="text-gray-300 transition-colors duration-300 hover:text-teal-400">
                                    Home
                                </Link>
                            </li>
                            <li>
                                <Link href="/about" className="text-gray-300 transition-colors duration-300 hover:text-teal-400">
                                    About
                                </Link>
                            </li>
                            <li>
                                <Link href="/contact" className="text-gray-300 transition-colors duration-300 hover:text-teal-400">
                                    Contact
                                </Link>
                            </li>
                            <li>
                                <Link href="/pricing" className="text-gray-300 transition-colors duration-300 hover:text-teal-400">
                                    Pricing
                                </Link>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 className="mb-4 text-lg font-semibold">Services</h3>
                        <ul className="space-y-2">
                            <li>
                                <a href="#" className="text-gray-300 transition-colors duration-300 hover:text-teal-400">
                                    Certificate Verification
                                </a>
                            </li>
                            <li>
                                <a href="#" className="text-gray-300 transition-colors duration-300 hover:text-teal-400">
                                    Diver Management
                                </a>
                            </li>
                            <li>
                                <a href="#" className="text-gray-300 transition-colors duration-300 hover:text-teal-400">
                                    Training Records
                                </a>
                            </li>
                            <li>
                                <a href="#" className="text-gray-300 transition-colors duration-300 hover:text-teal-400">
                                    Equipment Log
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 className="mb-4 text-lg font-semibold">Contact Us</h3>
                        <ul className="space-y-2">
                            <li className="flex items-center text-gray-300">
                                <Mail className="mr-2 h-4 w-4 text-teal-500" />
                                <span>support@divemaster.com</span>
                            </li>
                            <li className="flex items-center text-gray-300">
                                <PhoneCall className="mr-2 h-4 w-4 text-teal-500" />
                                <span>+1 (555) 123-4567</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div className="mt-12 flex flex-col justify-between border-t border-slate-800 pt-8 md:flex-row">
                    <p className="text-sm text-gray-400">&copy; {new Date().getFullYear()} DiveMaster. All rights reserved.</p>
                    <div className="mt-4 md:mt-0">
                        <ul className="flex space-x-6 text-sm text-gray-400">
                            <li>
                                <a href="#" className="transition-colors duration-300 hover:text-teal-400">
                                    Privacy Policy
                                </a>
                            </li>
                            <li>
                                <a href="#" className="transition-colors duration-300 hover:text-teal-400">
                                    Terms of Service
                                </a>
                            </li>
                            <li>
                                <a href="#" className="transition-colors duration-300 hover:text-teal-400">
                                    Cookie Policy
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    );
};

export default Footer;
