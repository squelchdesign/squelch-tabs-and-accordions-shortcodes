// @ts-check
// `@type` JSDoc annotations allow editor autocompletion and type checking
// (when paired with `@ts-check`).
// There are various equivalent ways to declare your Docusaurus config.
// See: https://docusaurus.io/docs/api/docusaurus-config

import {themes as prismThemes} from 'prism-react-renderer';

/** @type {import('@docusaurus/types').Config} */
const config = {
  title: 'Squelch Tabs and Accordions',
  tagline: 'What will you build?',
  favicon: 'img/favicon.ico',

  // Set the production url of your site here
  url: 'https://your-docusaurus-site.example.com',
  // Set the /<baseUrl>/ pathname under which your site is served
  // For GitHub pages deployment, it is often '/<projectName>/'
  baseUrl: '/',

  // GitHub pages deployment config.
  // If you aren't using GitHub pages, you don't need these.
  organizationName: 'squelchdesign', // Usually your GitHub org/user name.
  projectName: 'squelch-tabs-and-accordions-shortcodes', // Usually your repo name.

  onBrokenLinks: 'throw',
  onBrokenMarkdownLinks: 'warn',

  // Even if you don't use internationalization, you can use this field to set
  // useful metadata like html lang. For example, if your site is Chinese, you
  // may want to replace "en" with "zh-Hans".
  i18n: {
    defaultLocale: 'en',
    locales: ['en'],
  },

  presets: [
    [
      'classic',
      /** @type {import('@docusaurus/preset-classic').Options} */
      ({
        docs: {
          sidebarPath: './sidebars.js'
          // Please change this to your repo.
          // Remove this to remove the "edit this page" links.
        },
        theme: {
          customCss: './src/css/custom.css',
        },
      }),
    ],
  ],

  themeConfig:
    /** @type {import('@docusaurus/preset-classic').ThemeConfig} */
    ({
      // Replace with your project's social card
      image: 'img/docusaurus-social-card.jpg',
      navbar: {
        title: 'Home',
        logo: {
          alt: 'Squelch Tabs and Accordions logo',
          src: 'img/logo.svg',
        },
        items: [
          {
            type: 'docSidebar',
            sidebarId: 'sb',
            position: 'left',
            label: 'Documentation',
          },
          {
            href: 'https://github.com/squelchdesign/squelch-tabs-and-accordions-shortcodes/',
            label: 'GitHub',
            position: 'right',
          },
        ],
      },
      footer: {
        style: 'dark',
        links: [
          {
            title: 'Documentation',
            items: [
              {
                label: 'Complete documentation',
                to: '/docs/intro',
              },
            ],
          },
          {
            title: 'Community',
            items: [
              {
                label: 'GitHub',
                href: 'https://github.com/squelchdesign/squelch-tabs-and-accordions-shortcodes/',
              },
              {
                label: 'Get support',
                href: 'https://wordpress.org/support/plugin/squelch-tabs-and-accordions-shortcodes/',
              },
              {
                label: 'Write a review',
                href: 'https://wordpress.org/support/plugin/squelch-tabs-and-accordions-shortcodes/reviews/',
              },
              {
                label: 'Plugin homepage',
                href: 'https://wordpress.org/plugins/squelch-tabs-and-accordions-shortcodes/',
              },
            ],
          },
          {
            title: 'More',
            items: [
              {
                label: 'Download',
                href: 'https://github.com/squelchdesign/squelch-tabs-and-accordions-shortcodes/releases',
              },
              {
                label: 'Squelch Unspam',
                href: 'https://wordpress.org/plugins/squelch-unspam/',
              },
            ],
          },
        ],
        copyright: `Copyright © 2013–${new Date().getFullYear()} { Squelch Design } Ltd / Matt Lowe.`,
      },
      prism: {
        theme: prismThemes.github,
        darkTheme: prismThemes.dracula,
        additionalLanguages: ['php'],
      },
    }),
};

export default config;
