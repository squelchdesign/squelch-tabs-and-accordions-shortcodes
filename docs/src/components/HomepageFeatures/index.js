import clsx from 'clsx';
import Heading from '@theme/Heading';
import styles from './styles.module.css';

const FeatureList = [
  {
    title: 'Add Style',
    Svg: require('@site/static/img/home-add-style.svg').default,
    description: (
      <>
        Using well designed tabs, accordions, toggles, and horizontal accordions can help make your website look more
        professional and better polished than your competitors' websites.
      </>
    ),
  },
  {
    title: 'Add Interactivity',
    Svg: require('@site/static/img/home-add-interactivity.svg').default,
    description: (
      <>
        With collapsible accordions, tabs, toggles, and horizontal accordions, you can make better use of the
        available space on the page and provide a richer experience for your visitors.
      </>
    ),
  },
  {
    title: 'Save Space',
    Svg: require('@site/static/img/home-save-space.svg').default,
    description: (
      <>
        Reducing the amount of visible content on the page can help make the page easier to navigate. Tabs,
        toggles, accordions, and horizontal accordions can organize and save space on the page.
      </>
    ),
  },
];

function Feature({Svg, title, description}) {
  return (
    <div className={clsx('col col--4')}>
      <div className="text--center">
        <Svg className={styles.featureSvg} role="img" />
      </div>
      <div className="text--center padding-horiz--md">
        <Heading as="h3">{title}</Heading>
        <p>{description}</p>
      </div>
    </div>
  );
}

export default function HomepageFeatures() {
  return (
    <section className={styles.features}>
      <div className="container">
        <div className="row">
          {FeatureList.map((props, idx) => (
            <Feature key={idx} {...props} />
          ))}
        </div>
      </div>
    </section>
  );
}
