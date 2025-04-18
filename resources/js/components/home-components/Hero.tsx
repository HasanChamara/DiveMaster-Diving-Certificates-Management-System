import { Award, ChevronRight, Search, Shield } from 'lucide-react';
import React from 'react';

const Hero: React.FC = () => {
    return (
        <div className="relative overflow-hidden bg-gradient-to-b from-slate-900 to-slate-800">
            {/* Animated wave background */}
            <div className="absolute inset-0 opacity-10">
                <svg className="h-full w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path
                        fill="#0099ff"
                        fillOpacity="1"
                        d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
                        className="animate-pulse"
                        style={{ animationDuration: '10s' }}
                    ></path>
                </svg>
            </div>

            <div className="relative z-10 mx-auto max-w-7xl px-4 py-24 sm:px-6 md:py-32 lg:px-8">
                <div className="md:flex md:items-center md:space-x-8">
                    <div className="mb-12 md:mb-0 md:w-1/2">
                        <h1 className="mb-6 text-4xl leading-tight font-bold text-white md:text-5xl">
                            Manage Diving Certifications <span className="text-teal-400">Effortlessly</span>
                        </h1>
                        <p className="mb-8 text-xl leading-relaxed text-gray-300">
                            The complete solution for diving instructors and schools to issue, track, and verify diving certifications in one secure
                            platform.
                        </p>
                        <div className="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                            <button className="flex items-center justify-center rounded-lg bg-teal-600 px-6 py-3 font-medium text-white transition duration-150 ease-in-out hover:bg-teal-700">
                                Get Started
                                <ChevronRight className="ml-2 h-5 w-5" />
                            </button>
                            <button className="flex items-center justify-center rounded-lg border border-gray-500 bg-transparent px-6 py-3 font-medium text-white transition duration-150 ease-in-out hover:border-teal-400">
                                See Demo
                            </button>
                        </div>
                    </div>
                    <div className="md:w-1/2">
                        <div className="rounded-xl border border-white/10 bg-white/10 p-6 shadow-xl backdrop-blur-lg">
                            <div className="mb-6 flex items-center justify-between">
                                <h3 className="text-xl font-medium text-white">Certificate Verification</h3>
                                <Search className="h-5 w-5 text-teal-400" />
                            </div>
                            <div className="mb-4 rounded-lg border border-white/10 bg-white/5 p-4">
                                <div className="flex items-start">
                                    <div className="mt-1 flex-shrink-0">
                                        <Shield className="h-5 w-5 text-teal-500" />
                                    </div>
                                    <div className="ml-3">
                                        <h4 className="text-sm font-medium text-white">Verify Certificate</h4>
                                        <p className="mt-1 text-xs text-gray-300">Enter certificate ID to verify authenticity.</p>
                                        <div className="mt-3 flex">
                                            <input
                                                type="text"
                                                placeholder="Certificate ID"
                                                className="flex-1 rounded-l-lg border border-white/20 bg-white/10 px-3 py-2 text-sm text-white placeholder-gray-400 focus:border-transparent focus:ring-2 focus:ring-teal-500 focus:outline-none"
                                            />
                                            <button className="rounded-r-lg bg-teal-600 px-4 text-sm font-medium text-white transition duration-150 ease-in-out hover:bg-teal-700">
                                                Verify
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="mb-4 rounded-lg border border-white/10 bg-white/5 p-4">
                                <div className="flex items-start">
                                    <div className="mt-1 flex-shrink-0">
                                        <Award className="h-5 w-5 text-teal-500" />
                                    </div>
                                    <div className="ml-3">
                                        <h4 className="text-sm font-medium text-white">Recent Certifications</h4>
                                        <div className="mt-2 space-y-2">
                                            <div className="flex justify-between text-xs">
                                                <span className="text-gray-300">Advanced Open Water</span>
                                                <span className="text-teal-400">3 hours ago</span>
                                            </div>
                                            <div className="flex justify-between text-xs">
                                                <span className="text-gray-300">Rescue Diver</span>
                                                <span className="text-teal-400">5 hours ago</span>
                                            </div>
                                            <div className="flex justify-between text-xs">
                                                <span className="text-gray-300">Nitrox Specialist</span>
                                                <span className="text-teal-400">1 day ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button className="w-full rounded-lg bg-white/5 py-2 text-sm font-medium text-gray-300 transition duration-150 ease-in-out hover:bg-white/10 hover:text-white">
                                View All Certificates
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Hero;
